<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }


?>

<?php
	$id = $_GET['id'];    //this is not working it is being pulled from showguest.php
	error_log($id);


if($id != null) {
function open_connection()
{$sql = "DELETE FROM tlb_guest WHERE id = {$id} LIMIT 1";}
$result =mysqli_query($db, $sql);

	if($result && mysqli_affected_rows($db) == 1){
		redirect_to("showguests.php");}else {
		echo"Cannot run query";
		}
	}else {
 	error_log($id);
 	}	
 
?>
<?php if(isset($database)) { $database->close_connection(); } ?>