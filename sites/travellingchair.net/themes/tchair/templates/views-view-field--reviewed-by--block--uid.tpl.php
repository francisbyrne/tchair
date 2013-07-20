<?php
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
$user = user_load(strip_tags($output));

//dsm($user);


?>
<?php

	@$uri = $user->picture->uri? $user->picture->uri: "public://site_images/avatar.jpg";
	print l(theme_image_style(array(
	                    'style_name' => 'thumbnail',
	                    'path' => $uri,
	                    'attributes' => array(
	                        'class' => 'avatar'
	                    )            
	                )
	            ),
			"user/".$user->uid,
			array("html"=>TRUE)
			); 
?>
	
<div class="name"><? print l($user->field_name['und'][0]['value'],"user/".$user->uid,array("html"=>TRUE)); ?></div>
<div class="city"><? print $user->field_user_city['und'][0]['value']; ?></div>