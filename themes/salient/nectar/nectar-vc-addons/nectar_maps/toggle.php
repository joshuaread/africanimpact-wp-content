<?php 

return array(
	  "name" => __("Section", "js_composer"),
	  "base" => "toggle",
	  "allowed_container_element" => 'vc_row',
	  "is_container" => true,
	  "content_element" => false,
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Title", "js_composer"),
	      "param_name" => "title",
	      "description" => __("Accordion section title.", "js_composer")
	    ),
	     array(
		  "type" => "dropdown",
		  "heading" => __("Color", "js_composer"),
		  "param_name" => "color",
		  "admin_label" => true,
		  "value" => array(
		     "Default" => "Default",
			 "Accent-Color" => "Accent-Color",
			 "Extra-Color-1" => "Extra-Color-1",
			 "Extra-Color-2" => "Extra-Color-2",	
			 "Extra-Color-3" => "Extra-Color-3"
		   ),
		  'save_always' => true,
		  "description" => __("Please select the color you wish for your toggle to display in.", "js_composer")
		)
	  ),
	  'js_view' => 'VcAccordionTabView'
	);

?>