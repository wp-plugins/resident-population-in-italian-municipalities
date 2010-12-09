<?php
/*
Plugin Name: Istat
Plugin URI: http://www.vincenzopatruno.org/
Description: Official Resident Population in italian municipalities
Author: Vincenzo Patruno
Version: 1.0
Author URI: http://www.vincenzopatruno.org/
*/
 



function istat_widget($args) {
		
	extract($args);
	
	$options = get_option('plugin_istat_options');
	
   	echo $before_widget;
   	echo $before_title; 
   	echo "Population"; 
   	echo $after_title;	
	echo "<center>


<iframe width=\"230\" height=\"300\" src=\"http://www.vincenzopatruno.org/dir/bilanciowidget_wp.php?codice=$options[codcom]\" scrolling=\"no\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" ></iframe>		
</center>";

	
	echo $after_widget;
}



function istat_widget_control() {

    $options = get_option("plugin_istat_options"); 

    if ($_POST['istat-Submit']) {
        $options['codcom'] = htmlspecialchars($_POST['istat-WidgetWidth']);
        update_option("plugin_istat_options", $options);
    }

// html to show input box

?>

<p>
<label for="istat-WidgetWidth">Municipality Code: </label>
<input type="text" id="istat-WidgetWidth" name="istat-WidgetWidth" value="<?php echo $options['codcom']; ?>" />

<input type="hidden" id="istat-Submit"  name="istat-Submit" value="1" />
</p>

<?php

}

function init_istat(){
	register_sidebar_widget("Istat", "istat_widget");     
	register_widget_control('Istat', 'istat_widget_control');
}
 
add_action("plugins_loaded", "init_istat");
 
?>