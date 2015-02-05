<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("index.php"); }
?>
<?php
	$max_file_size = 1048576;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB
	
	$user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
	
	$photo = new Photograph();
	
	$sanitized_username = $database->escape_value($authusername);		 	 	
	$sql = "select * from tbl_story where name = '{$sanitized_username}'";
	//database connection is already made and called $db
   $result = $db -> query($sql);
	if (!$result) {
		echo"Cannot run query";
	  echo mysqli_error($db);
		exit;
		}
	//$story = mysqli_fetch_assoc($result);
	
								
	if(isset($_POST['submit'])) {
		$photo->username = $authusername;
		$photo->storyname = $_POST['storyname'];
		$photo->attach_file($_FILES['file_upload']);
		$photo->submission_date = $_POST['picdate'];
		$photo->images_path = ('images/'.$authusername);
		$story_id = $_POST['story_id'];
		if($photo->save()) {
			// Success]
			if (!$db) {
    			die("Connection failed: " . mysqli_connect_error());
				}				
			$sql= "UPDATE tbl_story SET image_id = '{$photo->image_id}' WHERE id = '{$story_id}' ";
				$result = $db->query($sql);
				if ($result) {
    			echo "Record updated successfully";
					} else {
    				echo "Error updating record: " . mysqli_error($db);
					}	
      	$session->message("Photograph uploaded successfully.");
			redirect_to('list_photos.php'); 
		} else {
			// Failure
      	$message = join("<br />", $photo->errors);
		}
	}	
?>

<?php include('public/header.php'); ?>

<?php echo "<h2>".$authfirst." ".$authlast." upload your photos</h2> <br><br>"; ?>
		 
	<?php echo output_message($message); ?>
 <?php //*************notes to self need to make $story->storyname static some how so I can use in above in the update// ?>
  <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="file_upload" /></p>
    <p><select name="story_id"><?php while($story = mysqli_fetch_assoc($result)) { ; echo "<option value='". htmlentities($story['id'])."'>"; echo htmlentities($story['storyname'])."</option>"; } ?></select></p>
    <p>Picture Date: <input type="text" name="picdate" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
  </form>
   
<?php include('public/footer.php'); ?>
		