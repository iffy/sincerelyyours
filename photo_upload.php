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
		if($photo->save()) {
			// Success]
			var_dump($db);
			if (!$db) {
    			die("Connection failed: " . mysqli_connect_error());
				}				
			$sql_update = "UPDATE tbl_story SET image_name = '{$photo->storyname}' WHERE storyname = '{$photo->storyname}' ";
				if (mysqli_query($db, $sql_update)) {
    			echo "Record updated successfully";
					} else {
    				echo "Error updating record: " . mysqli_error($db);
					}	
      $session->message("Photograph uploaded successfully.");
			//redirect_to('list_photos.php');  //************remember to put this back in************
		} else {
			// Failure
      $message = join("<br />", $photo->errors);
		}
	}	
?>

<?php include('public/header.php'); ?>

<?php echo "<h2>".$authfirst." ".$authlast." upload your photos</h2> <br><br>"; ?>
		 
	<?php echo output_message($message); ?>
 
  <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="file_upload" /></p>
    <p><select name="storyname"><?php while($story = mysqli_fetch_assoc($result)) { ; echo "<option value='". htmlentities($story['storyname'])."'>"; echo htmlentities($story['storyname'])."</option>"; } ?></select></p>
    <p>Picture Date: <input type="text" name="picdate" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
  </form>
   
<?php include('public/footer.php'); ?>
		