<?php
require_once('public/initialize.php');

if (!$session->is_logged_in()) { redirect_to("index.php"); }

	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
// Remember to give your form's submit tag a name="submit" attribute!

if (isset($_POST['submit'])) { // Form has been submitted.
	
	$guest = new Guest();
	$guest->username = $authusername;
  	$guest->firstname = trim($_POST['firstname']);
  	$guest->lastname = trim($_POST['lastname']);
  	$guest->email = trim($_POST['email']);
  	$guest->relation = trim($_POST['relation']);
		
	if($guest->save()) {
			// Success
      $session->message("Guest was saved successfully.");
			redirect_to('index.php');
		} else {
			// Failure
      $session->message("Guest was not saved.");
	
	}
	
	}else{
	$username	= $authusername;
  	$firstname 	= "";
  	$lastname	= "";
  	$email		= "";
  	$relation	= "";
}
?>

<?php include 'public/header.php'; ?>

		<?php echo "<h2>".$authfirst." ".$authlast." create a guest who can read your story.</h2> <br><br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="create_guests.php" enctype="multipart/form-data" method="post">
		  <table>
		    <tr>
		      <td>First Name:</td>
		      <td>
			<input type="text" name="firstname" maxlength="40" value="<?php echo htmlentities($firstname); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Last Name:</td>
		      <td>
		        <input type="text" name="lastname" maxlength="40" value="<?php echo htmlentities($lastname); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email" maxlength="40" value="<?php echo htmlentities($email); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Relation:</td>
		      <td>
		        <input type="text" name="relation" maxlength="40" value="<?php echo htmlentities($relation); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Save Guest" />
		      </td>
		    </tr>
		  </table>
		</form>		


<?php include 'public/footer.php'; ?>

