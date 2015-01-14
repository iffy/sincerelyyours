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
	error_log($authusername);
	$photo = new Photograph();
			 	 	
	$storys = Story::find_by_name($authusername);	
		foreach($storys as $story):
		$story_storynames = $story->storyname;	
		
	if(isset($_POST['submit'])) {
				
		$photo->username = $showusername;
		$photo->storyname = $_POST['storyname'];
		$photo->attach_file($_FILES['file_upload']);
		$photo->submission_date = $_POST['picdate'];
		$photo->images_path = ('images/'.$showusername);
		if($photo->save()) {
			// Success
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
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="file_upload" /></p>
    <p><?php while($authusername =! null) { ?><select name="storyname"><option value=" <?php echo $story_storynames; } ?> "></option></select></p>
    <p>Picture Date: <input type="text" name="picdate" value="" /></p>
    <input type="submit" name="submit" value="Upload" />
  </form>
  
<?php endforeach ?> 
<?php include('public/footer.php'); ?>
		