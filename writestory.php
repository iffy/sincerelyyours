<?php
require_once('public/initialize.php');

if (!$session->is_logged_in()) { redirect_to("index.php"); }

	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
	error_log($authusername);

	$guests = new Guest ();
	foreach($guests as $guest):
	$auth_guest = $guest->find_by_name($authusername);              //not working
	$authguestusername = $guest->username;
	$authguestemail = $guest->email;
	$authguestfirstname = $guest->firstname;
	$authguestlastname = $guest->lastname;
	$authguestrelation = $guest->relation;
	error_log($auth_guest);
	error_log($authguestusername);
	
// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.
	
	$story = new Story();
  	$story->name = $authusername;
  	$story->storyname = trim($_POST['storyname']);
  	$story->stories = trim($_POST['stories']);
  	$story->date = trim($_POST['date']);
	
	if($story->save()) {
			// Success
      $session->message("Story was saved successfully.");
			redirect_to('stories.php');
		} else {
			// Failure
      $session->message("Story was not saved.");
	
	}
	
	}else{
  	$storyname 	= "";
  	$date 		= "";
  	$stories		= "";
}
?>

<?php include 'public/header.php'; ?>

		<?php echo "<h2>".$authfirst." ".$authlast." write a story.</h2> <br>"; ?>
		
		<?php echo output_message($message); ?>
		<form action="writestory.php" enctype="multipart/form-data" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
			<input type="text" name="name" value="<?php echo $authusername; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Story Name:</td>
		      <td>
		        <input type="text" name="storyname" maxlength="40" value="<?php echo htmlentities($storyname); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Story Date:</td>
		      <td>
		        <input type="text" name="date" maxlength="40" value="<?php echo htmlentities($date); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Write Story:</td>
		      <td>
		        <textarea spellcheck="true" Name ="stories" rows="20" cols="70"></textarea>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <div><?php while($authusername == $authguestusername) { ?><input name="checkbox[]" type= "checkbox" id="checkbox[]" value "<?php  $authguestemail; ?>"><?php $authguestfirstname; }?></div>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		      <td>
		        <input type="submit" name="submit" value="Save Story" />
		      </td>
		    </tr>
		  </table>
		</form>		
<?php endforeach ?>

<?php include 'public/footer.php'; ?>

