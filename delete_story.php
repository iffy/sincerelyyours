<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }

	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
?>

<?php
	$id = $_GET['id'];    
	$name= $_GET['name'];

if($name == $authusername) {

$sql = "DELETE FROM tbl_story WHERE id = '$id' LIMIT 1";
$result = $db->query($sql); 
	  if ($result != null) {

		redirect_to("stories.php");}else {
		echo"Cannot run query";
 		}	
 }else {
 echo "Invalid user";	
} 	
?>
<?php if(isset($database)) { $database->close_connection(); } ?>