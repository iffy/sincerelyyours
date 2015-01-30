<?php
require_once('public/initialize.php');

if ($session->is_logged_in()) { 

	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
}
	
if (isset($_POST['submit'])) { // Form has been submitted.

$mail = new PHPMailer();

$from_name = trim($_POST['name']);
$from = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = htmlentities(($_POST['comment']));

$to_name = "My Stories Are";
$to ="jebarlow@gmail.com"; 
//$subject = "Mail Test at ". strftime("%T", time());
//$message = "Testing Mail";
$message = wordwrap($message, 70);
//$from_name = "Joseph Barlow";
//$from = "jebarlow@gmail.com";

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
$mail->Body			= $message;

if (sent == $mail->send()){

			// Success
      $session->message("Comment was sent, thank you.");
			redirect_to('index.php');
		} else {
			// Failure
      $session->message("Sorry, comment was not sent.");
	
	}
	
	}else{
  	$name 	= "";
  	$subject = "";
  	$email	= "";
  	
}

?>
<?php include 'public/header.php'; ?>

		<?php echo "<h2>".$authfirst." ".$authlast."<p> Leave a comment.</h2> <br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="comment.php" enctype="multipart/form-data" method="post">
		  <table>
		   <tr>
		      <td>Name:</td>
		      <td>
		        <input type="text" name="name" maxlength="40" value="<?php echo htmlentities($name); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Subject:</td>
		      <td>
		        <input type="text" name="subject" maxlength="40" value="<?php echo htmlentities($subject); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Email:</td>
		      <td>
		      	<input type="text" name="email" maxlength="40" value="<?php echo htmlentities($email); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Comment:
		      </td>
		      <td>
		      	<textarea spellcheck="true" Name ="comment" rows="10" cols="40"></textarea>
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		      </td>
		      <td>
		        <input type="submit" name="submit" value="Send Comment" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include 'public/footer.php'; ?>