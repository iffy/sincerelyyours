<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	//echo $authusername;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;	
	//error_log($authusername);
	
	?>
	
<?php	
// Find guest by username
  $sanitized_username = $database->escape_value($authusername);
  //error_log($sanitized_username);		 	 	
	$sql = "select * from tbl_guests where username = '{$sanitized_username}'";
	//database connection is already made and called $db
   $result = $db -> query($sql);
	if (!$result) {
		echo"Cannot run query";
	  echo mysqli_error($db);
	  
		exit;
		}
    ?>

<?php include('public/header.php'); ?>  

<?php echo "<h2>".$authfirst." ".$authlast." your guests</h2> <br><br>" ?>

<a href="create_guests.php">Create Guests</a><br><br><br>
<table>
<?php while($guest = mysqli_fetch_assoc($result)) { ?>
	 <?php echo "<tr><td>". $guest['firstname']." ".$guest['lastname']."<br>";
			echo $guest['email']."<br>";
			echo $guest['relation']."<br>";
			echo "<a href='edit_guests.php?id=".$guest['id']."'>edit</a> <a href='delete_guest.php?id=".$guest['id']."&name=".$authusername."'>delete</a> <br><hr></td></tr>"; }?>
 </table> 
  <?php include('public/footer.php'); ?>