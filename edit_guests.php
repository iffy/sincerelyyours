<?php
require_once('public/initialize.php');

if ($session->is_logged_in()) {
	$id = $_GET['id'];
	if (!isset($id)) {
		$id = $_POST['id'];	
	} 
}else{ redirect_to("login.php"); }



	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
// Remember to give your form's submit tag a name="submit" attribute!

	?>

<?php	
// Find guest by id
  $guest = Guest::find_by_id($id);	
  //$guestid = $guest->id;
  ?>


<?php

if (isset($_POST['submit'])) { // Form has been submitted.
	
	$guest = new Guest();
	
	$guest->username = $authusername;
  	$guest->firstname = trim($_POST['firstname']);
  	$guest->lastname = trim($_POST['lastname']);
  	$guest->email = trim($_POST['email']);
  	$guest->relation = trim($_POST['relation']);
  	$guest->password = sha1($guest->email);
  	
  	$gu_username = $guest->username;
  	$gu_firstname = $guest->firstname;
  	$gu_lastname = $guest->lastname;
  	$gu_email = $guest->email;
  	$gu_relation = $guest->relation;
  	$gu_password = $guest->password;
		
	$sql = "UPDATE tbl_guests SET username='{$gu_username}', firstname='{$gu_firstname}', lastname='{$gu_lastname}', email='{$gu_email}', relation='{$gu_relation}', password='{$gu_password}' WHERE id='{$id}'";
	$result = $db->query($sql);
	if ($result) {
    $session->message("Guest edited successfully.");
    redirect_to("showguests.php");
} else {
    echo "Error updating record: " . mysqli_error($db);
}
	
	}else{   
?>

<?php include 'public/header.php'; ?>

		<?php echo "<h2>".$authfirst." ".$authlast." update your guest information.</h2> <br><br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="edit_guests.php" enctype="multipart/form-data" method="post">
		  <table>
		  	<tr>
				<td>
				<input type="hidden" name="id" maxlength="11" value="<?php echo $guest->id; ?>" />
				</td>		  	
				<td>
				</td>		  	
		  	</tr>
		    <tr>
		      <td>First Name:</td>
		      <td>
			<input type="text" name="firstname" maxlength="40" value="<?php echo $guest->firstname; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Last Name:</td>
		      <td>
		        <input type="text" name="lastname" maxlength="40" value="<?php echo $guest->lastname; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email" maxlength="40" value="<?php echo $guest->email; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Relation:</td>
		      <td>
		        <input type="text" name="relation" maxlength="40" value="<?php echo $guest->relation; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Update Guest" />
		      </td>
		    </tr>
		  </table>
		</form>		

 <?php }  ?>
<?php include 'public/footer.php'; ?>

