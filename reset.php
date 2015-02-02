<?php
require_once('public/initialize.php');

$old_password = $_GET['id'];    
$first_name= $_GET['name'];

$sql = "SELECT * FROM auth WHERE password = '{$old_password}'";
$result = $db->query($sql);
if (!$result) {
		$session->message("Sorry, cannot access database. Please try later.");
	  	echo mysqli_error($db);
		exit;
		}

while($auth = mysqli_fetch_assoc($result)) {

$authlast = $auth['lastname'];
};
		
if (isset($_POST['submit'])) { // Form has been submitted.

$password = trim($_POST['password']);
$password1 = trim($_POST['password1']);


}
?>
<?php include 'public/header.php'; ?>

		<?php echo"<h2>". $first_name." ".$authlast." please choose a new password.</h2> <br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="reset.php" enctype="multipart/form-data" method="post">
		  <table>
		   <tr>
		      <td>Password:</td>
		      <td>
		        <input type="text" name="name" maxlength="40" required value="<?php echo htmlentities($password); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Repeat Password:</td>
		      <td>
		      	<input type="text" name="email" maxlength="40" required value="<?php echo htmlentities($password1); ?>" />
		      </td>
		      <td>
		      </td>
		    <tr>
		      <td colspan="2">
		      </td>
		      <td>
		        <input type="submit" name="submit" value="Update Password" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include 'public/footer.php'; ?>