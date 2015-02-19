<?php
require_once('public/initialize.php');

if (!$session->is_logged_in()) { redirect_to("index.php"); }

	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;

	
	$sanitized_username = $database->escape_value($authusername);
	$sql = "select * from tbl_guests where username = '{$sanitized_username}'";
	//database connection is already made and called $db
   $result = $db -> query($sql);
	if (!$result) {
		echo"Cannot run query";
	  	echo mysqli_error($db);
		exit;
		}
	
	
	
	
// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.
	$story = new Story();
  	$story->name = $authusername;
  	$story->storyname = trim($_POST['storyname']);
  	$story->stories = trim($_POST['stories']);
  	$story->date = trim($_POST['date']);
	$story->guest_id =implode(",", $_POST['guest']);
	$story->comments = trim($_POST['comments']);	
	
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
		      <td>Story Name:</td>
		      <td>
		        <input type="text" name="storyname" maxlength="40" value="<?php echo htmlentities($storyname); ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Story Date:</td>
		      <td>
		        <input type="text" name="date" maxlength="40" value="<?php echo htmlentities($date); ?>" />
		      </td>
		      <td>
		      Guests:
		      </td>
		    </tr>
		    <tr>
		      <td>Write Story:</td>
		      <td>
		        <textarea spellcheck="true" name ="stories" rows="20" cols="70"></textarea>
		      </td>
		      <td>
		      <?php while ($guest = mysqli_fetch_assoc($result)) { 
		      	echo "<input type='checkbox' name='guest[]' value='". htmlentities($guest['id'])."'>"; 
		      	echo htmlentities($guest['firstname'])." ". htmlentities($guest['lastname'])."<br>";}?>
		      </td>
		    </tr>
		    <tr>
		    	<td colspan="2"> Allow Comments: 
		    		<input type = 'Radio' Name ='comments' value= '0'>No
				 	<input type = 'Radio' Name ='comments' value= '1'>Yes
		    	</td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		      </td>
		      <td>
		        <input type="submit" name="submit" value="Save Story" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include 'public/footer.php'; ?>

