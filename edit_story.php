<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	//echo $authusername;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;	
	
	$id = $_GET['id'];
	error_log($id."--1");
	
$sanitized_username = $database->escape_value($authusername);
	$sql = "select * from tbl_guests where username = '{$sanitized_username}'";
	//database connection is already made and called $db
   $result = $db -> query($sql);
	if (!$result) {
		echo"Cannot run query";
	  echo mysqli_error($db);
		exit;
		}	
	
	?>
	
<?php	
// Find story by id
  $story = Story::find_by_id($id);	
   
// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.
	 //*****this does not show up and I lose the $_GET[$id] at this point also nothing prints here, WHY?******
	//$story = new Story();
  	$name = $authusername;
	$id = trim($_POST['id']);
	error_log($id."--2");
  	$stories = htmlentities($_POST['stories']);
  	$date = trim($_POST['date']);
	$guest_id =($_POST['guest']);	
	
	//***********sql statement below does not work *********
	$sql = "UPDATE tbl_story SET stories='$stories', date='$date', guest_id='$guest_id' WHERE id='$id' LIMIT 1";
	if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
    redirect_to("stories.php");
} else {
    echo "Error updating record: " . mysqli_error($db);
}
	
	}else{   
    ?>

<?php include('public/header.php'); ?>  

<?php echo "<h2>".$authfirst." ".$authlast." your story</h2> <br><br>" ?>
	

		<?php echo output_message($message); ?>
		<form action="edit_story.php" enctype="multipart/form-data" method="post">
		  <table>
		   <tr>
		      <td></td>
		      <td>
		       <input type="hidden" name="id" maxlength="11" value="<?php echo $story->id; ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		   <tr>
		      <td>Story Name:</td>
		      <td>
		       <h3>  <?php echo $story->storyname; ?></h3>
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Edit Date:</td>
		      <td>
		        <input type="text" name="date" maxlength="40" value="<?php echo $story->date; ?>" />
		      </td>
		      <td>
		      Guests:
		      </td>
		    </tr>
		    <tr>
		      <td>Edit Story:</td>
		      <td>
		        <textarea spellcheck="true" Name ="stories" rows="20" cols="75"><?php echo $story->stories; ?></textarea>
		      </td>
		      <td>
		      <?php while ($guest = mysqli_fetch_assoc($result)) { 
		      	echo "<input type='checkbox' name='guest' 'value='". htmlentities($guest['id']).","."'>"; 
		      	echo htmlentities($guest['firstname'])." ". htmlentities($guest['lastname'])."<br>";}?>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="3">
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		      </td>
		      <td>
		        <input type="submit" name="submit" value="Update Story" />
		      </td>
		    </table>
		</form>
  
  <?php }  ?>
  <?php include('public/footer.php'); ?>