<?php
require_once('public/initialize.php');

if($session->is_logged_in()) {
  redirect_to("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!

if (isset($_POST['submit'])) { // Form has been submitted.
	
$user = new User();
  	$user->username = trim($_POST['username']);
  	$user->password = sha1($_POST['password']); 	
  	$user->password1 = sha1($_POST['password1']);
  	$user->email = trim($_POST['email']);
  	$user->firstname = trim($_POST['firstname']);
  	$user->lastname = trim($_POST['lastname']);	
	
	$username = $user->username;
	$email = $user->email;
	
	$db = new MYSQLDatabase();
	
	$sql = "SELECT * FROM auth WHERE username = '$username' ";
	$username_result = $db->query($sql);
	if (!$username_result) {
		echo"Cannot run username_result query";	
		exit;
	}
	$row1 = mysqli_fetch_row($username_result);
	$count1 = $row1[0];
		
	$sql = "SELECT * FROM auth WHERE email = '$email'";
	$email_result = $db->query($sql);
	if (!$email_result) {
		echo"Cannot run email_result query";	
		exit;
	}
	$row2 = mysqli_fetch_row($email_result);
	$count2 = $row2[0];
		
if($user->save()) {	

			if ($count1 > 0) {
			$session->message("Username already exist please try again");
			redirect_to('register.php');	
			}	
			
			if ($count2 > 0) {
			$session->message("Email already exist please try again");
			redirect_to('register.php');	
			}	
			
			if($user->password == $user->password1) {	
				}else { $session->message("Passwords do not match");
					redirect_to('register.php');
				}
			// Success
      $session->message("Registration was successful.");
			$dir_path = "images/".$user->username;
			mkdir($dir_path, 0777);
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
			<input type="text" name="username" maxlength="40" required value="<?php echo htmlentities($username); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" min="6" max="12" required value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Repeat Password:</td>
		      <td>
		        <input type="password" name="password1" min="6" max="12" required value="<?php echo htmlentities($password1); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email" maxlength="40" required value="<?php echo htmlentities($email); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>First Name:</td>
		      <td>
		        <input type="text" name="firstname" maxlength="40" required value="<?php echo htmlentities($firstname); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Last Name:</td>
		      <td>
		        <input type="text" name="lastname" maxlength="40" required value="<?php echo htmlentities($lastname); ?>" />
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

