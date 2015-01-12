<?php
require_once('public/initialize.php');

if($session->is_logged_in()) {
  redirect_to("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!
if ($_SERVER['REQUEST_METHOD'] === "POST") { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  // Check database to see if username/password exist.
	
  $found_user = User::authenticate($username, $password);
  //$found_user = $user->authenticate($username, $password);

  if ($found_user) {
    $session->login($found_user);
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect. ".$found_user;
  }
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}

?>
<?php include 'public/header.php'; ?>

		<h2>Please Login</h2>
		<table>
			<tr>
				<td width = "90%" colspan="3">
					<?php echo output_message($message); ?>
				</td>
				<td>
					<a href="register.php">Register</a>
				</td>
			</tr>
		</table>
		

		<form action="login.php" enctype="multipart/form-data" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
			<input type="text" name="username" maxlength="40" value="<?php echo htmlentities($username); ?> " />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="text" name="password" maxlength="40" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include 'public/footer.php'; ?>
