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
		$photo->attach_file($_FILES['file_upload']);
		$photo->submission_date = $_POST['picdate'];
		$photo->storyname = $_POST['picname'];
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
    			$session->message("Photograph updated successfully.");
					} else {
    				$session->message("Photograph upload failed.")." ". mysqli_error($db);
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
  <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
<table>  
	<tr>  
	<td colspan="2">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
	</td>
	</tr>
	<tr>
	<td>Select File:
	</td> 
	<td><input type="file" name="file_upload" />
	</td>
	</tr>
	<tr>
	<td>Choose Story:
   </td>
   <td><select name="story_id"><?php while($story = mysqli_fetch_assoc($result)) { ; echo "<option value='". htmlentities($story['id'])."'>"; echo htmlentities($story['storyname'])."</option>"; } ?></select>
   </td>
   </tr> 
   <tr>
	<td>Picture Name:
	</td>   
	<td><input type="text" name="picname" value="" />
	</td>   
	</tr> 
	<tr>
	<td>Picture Date:
	</td>
	<td><input type="text" name="picdate" value="" />
	</td>
	<tr>  
   <td>
   </td>
   <td><input type="submit" name="submit" value="Upload" />
	</td>	
	</tr>
</table>
  </form>
   
<?php include('public/footer.php'); ?>
		