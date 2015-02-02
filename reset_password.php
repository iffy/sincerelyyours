<?php
require_once('public/initialize.php');

if (isset($_POST['submit'])) { // Form has been submitted.

$email = trim($_POST['email']);
$name = trim($_POST['name']);

$sql = "SELECT * FROM auth WHERE email = '{$email}'";
$result = $db->query($sql);
if (!$result) {
		echo"Cannot run query";
	  	echo mysqli_error($db);
		exit;
		}

while($auth = mysqli_fetch_assoc($result)) {

$authemail = $auth['email'];
$authname = $auth['firstname'];
$authpassword = $auth['password'];
};

if( strtolower($authname)==strtolower($name)) {

$mail = new PHPMailer();

$to_name = $name;
$to = $email;
$subject = "Password Change";
//$message = htmlentities(($_POST['comment']));

//$to_name = "My Stories Are";
//$to ="jebarlow@gmail.com"; 
//$subject = "Mail Test at ". strftime("%T", time());
//$message = "Testing Mail";
//$message = wordwrap($message, 70);
$from_name = "My Stories Are";
$from = "jebarlow@gmail.com";

$mail->IsSMTP();
$mail->Host			="smtp.mandrillapp.com";
$mail->Port			=587;
$mail->SMTPAuth	=true;
//$mail->SMTPDebug	=2;
$mail->Username	="jebarlow@gmail.com";
$mail->Password	="re9TTWTytIh7Sp7Clt-5mg";

$mail->FromName   = $from_name;
$mail->From 		= $from;
$mail->AddAddress($to, $to_name);
$mail->Subject		= $subject ." ". strftime("%T", time());
$mail->Body			=<<<EMAILBODY

Use the link below to login and change you password.

http://localhost/reset.php?id=$authpassword&name=$authname

If you have recieved this email by mistake please login and soon as possible
and change your password and contact us.

EMAILBODY;

if ('sent' == $mail->send()){

			// Success
      $session->message("Email was sent, thank you.");
			//redirect_to('index.php');
		} else {
			// Failure
      $session->message("Sorry, email was not sent.");
	
	}
}else {
	$session->message("First name does not match please try again");
	
}
	
	}else{
  	$name 	= "";
  	$email	= "";
  	
}

?>
<?php include 'public/header.php'; ?>

		<?php echo "<h2>Please fill this out to reset your password.</h2> <br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="reset_password.php" enctype="multipart/form-data" method="post">
		  <table>
		   <tr>
		      <td>First Name:</td>
		      <td>
		        <input type="text" name="name" maxlength="40" required value="<?php echo htmlentities($name); ?>" />
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
		    <tr>
		      <td colspan="2">
		      </td>
		      <td>
		        <input type="submit" name="submit" value="Send Notification" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include 'public/footer.php'; ?>