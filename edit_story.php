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
    ?>

<?php include('public/header.php'); ?>  

<?php echo "<h2>".$authfirst." ".$authlast." your story</h2> <br><br>" ?>
	

		<?php echo output_message($message); ?>
		<form action="edit_story.php" enctype="multipart/form-data" method="post">
		  <table>
		   <tr>
		      <td>Story Name:</td>
		      <td>
		        <input type="text" name="storyname" maxlength="40" value="<?php echo $story->storyname; ?>" />
		      </td>
		      <td>
		      </td>
		    </tr>
		    <tr>
		      <td>Story Date:</td>
		      <td>
		        <input type="text" name="date" maxlength="40" value="<?php echo $story->date; ?>" />
		      </td>
		      <td>
		      Guests:
		      </td>
		    </tr>
		    <tr>
		      <td>Write Story:</td>
		      <td>
		        <textarea spellcheck="true" Name ="stories" rows="20" cols="70"><?php echo $story->stories; ?></textarea>
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
  
  
  <?php include('public/footer.php'); ?>