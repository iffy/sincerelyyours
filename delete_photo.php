<?php require_once("public/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	// must have an ID and name
  if(empty($_GET['id'])&empty($_GET['name'])) {
  	$session->message("No photograph ID & name was provided.");
    redirect_to('index.php');
  }
  $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;

$id =$_GET['id'];
$name=$_GET['name'];

  $photo = Photograph::find_by_id($id);
  $file = $photo->images_path."/".$photo->image_name;
  
  if($name == $authusername) {
  
 	$sql = "DELETE FROM tbl_images WHERE image_id = '{$id}' LIMIT 1";
	$result = $db->query($sql); 
	  if ($result != null) { 
  
  		if (file_exists($file)) {
    		unlink($file); // Delete now
			} 
  
    $session->message("The photo {$photo->image_name} was deleted.");
    redirect_to('list_photos.php');
  } else {
    $session->message("The photo could not be deleted.");
    redirect_to('list_photos.php');
  }
  }
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
