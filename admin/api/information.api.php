<?php   
	header("content-type:text/html; charset=utf-8;");
	include("../model/Db.class.php");
	include("../controller/information.class.php");
	$user = new User();

if (isset($_GET['information'])&&$_GET['information']=="informationDelete") {
			
				$id = $_POST['id'];
				$ikum = $user->informationDelete($id); 
		
				// echo json_encode(array(length=>$ikum)); 
				echo json_encode($ikum);
}
?>