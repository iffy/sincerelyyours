<?php
require_once('public/initialize.php');

if($session->is_logged_in()) {
  redirect_to("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!

if (isset($_POST['submit'])) { // Form has been submitted.
	
	$user = new User();
  	$user->username = trim($_POST['username']);
  	$user->password = sha1(trim($_POST['password']));
  	$user->email = trim($_POST['email']);
  	$user->firstname = trim($_POST['firstname']);
  	$user->lastname = trim($_POST['lastname']);
	
	if(!$user->username){	
		echo "Username not filled out";
		exit;
		}
	
	if(!$user->password){
		echo "Password not filled out";
		exit;
		}
	
	if(!$user->email){
		echo "Email not filled out";
		exit;
		}
	
	if(!$user->firstname) {
		echo "First Name not filled out";
		exit;
		}		
	
	if(!$user->lastname) {
		echo "Last Name not filled out";
		exit;
		}
	
	if($user->save()) {
			// Success
      $session->message("Registration was successful.");
			redirect_to('login.php');
		} else {
			// Failure
      $session->message("Registration was not successful.");
	
	}
	
	}else{
	$username 	= "";
  	$password 	= "";
  	$password1 	= "";
  	$email 		= "";
  	$firstname 	= "";
  	$lastname 	= "";
}
?>

<?php include 'public/header.php'; ?>

		<h2>Please Register</h2>
		
		<?php echo output_message($message); ?>
		<form action="register.php" enctype="multipart/form-data" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
			<input type="text" name="username" maxlength="40" value="<?php echo htmlentities($username); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="40" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email" maxlength="40" value="<?php echo htmlentities($email); ?>" />
		      </td>
		    </tr>
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
		      <td colspan="2">
		        <input type="submit" name="submit" value="Register" />
		      </td>
		    </tr>
		  </table>
		</form>		


<?php include 'public/footer.php'; ?>

