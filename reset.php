<?php
require_once('public/initialize.php');

$old_password = $_GET['id'];    
$first_name= $_GET['name'];
$email = $_GET['email'];

if (!isset($old_password)){
$old_password = $_POST['old_password'];	
	}
	
	if (!isset($first_name)){
$first_name = $_POST['first_name'];	
	}
	
	if (!isset($email)){
$email = $_POST['email'];	
	}


$sql = "SELECT * FROM auth WHERE email = '{$email}'";
$result = $db->query($sql);
if (!$result) {
		$session->message("Sorry, cannot access database. Please try later.");
	  	echo mysqli_error($db);
		exit;
		}
$row = mysqli_fetch_assoc($result);

$authid = $row['id'];
$auhtlast =$row['lastname'];
$authfirst = $row['firstname'];
$authpassword = $row['password'];
$authemail = $row['email'];



if (isset($_POST['submit'])) { // Form has been submitted.

$password = sha1($_POST['password']);
$password1 = sha1($_POST['password1']);
$email = trim($_POST['email']);
$first_name = $_POST['first_name'];
$old_password = $_POST['old_password'];

if($old_password==$password) {
 echo "Please must be different from last time";
 exit;
 }
 
 if($password==null) {
 echo "Please enter a password";
 exit;
 }
 echo "1".$password;
 echo "2".$password1;
if($password != $password1) { 
 echo "Please make sure passwords match";
 exit;
 }
 
 
 if($authfirst==$first_name & $authemail==$email) {
	$sql1 = "UPDATE auth SET password = '{$password}' WHERE id = '{$authid}' ";
	$result1 = $db->query($sql1);
	if ($result1) {
    $session->message("Password updated successfully.");
    redirect_to("login.php");
} else {
    echo "Error updating record: " . mysqli_error($db);
}
}
 }
?>
<?php include 'public/header.php'; ?>
		
		<?php echo output_message($message); ?>
		<form action="reset.php" enctype="multipart/form-data" method="post">
		  <table>
		  <tr>
		      <td></td>
		      <td>
		        <input type="hidden" name="first_name" maxlength="40" required value="<?php echo htmlentities($first_name); ?>" />
		        <input type="hidden" name="old_password" maxlength="40" required value="<?php echo htmlentities($old_password); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
			<tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" name="email" maxlength="40" required value="<?php echo htmlentities($email); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>		   
		   <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="40" required value="<?php echo htmlentities($password); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Repeat Password:</td>
		      <td>
		      	<input type="password" name="password1" maxlength="40" required value="<?php echo htmlentities($password1); ?>" />
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