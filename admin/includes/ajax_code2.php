<?php 

require("init.php");

$user = new User();

if (isset($_POST['image_name'])) {

	

	// echo "This is data from the server YAYYYYYYYY";

	$user->ajax_save_user_image($_POST['image_name'],$_POST['user_id']);

	// $image_name = $_POST['image_name'];

	// echo $image_name;
	
}

// if (isset($_POST['photo_id'])) {

// 	// $photo = 

// 	Photo::display_sidebar_data($_POST['photo_id']);

	
// }


 ?>