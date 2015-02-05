<?php require_once("public/initialize.php"); 
 if (!$session->is_logged_in()) { redirect_to("login.php"); } 

  // Find all the photos
  $photos = Photograph::find_all();
  
  $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;
	
?>
<?php include('public/header.php'); ?>

<?php echo "<h2>".$authfirst." ".$authlast." your photos</h2> <br><br>"; ?>
<a href="photo_upload.php">Upload a new photograph</a><br></br>
<?php echo output_message($message); ?>
<table class="bordered">
  <tr>
    <th>Image</th>
    <th>Story ID</th>
    <th>Story Name</th>
    <th>Image Name</th>
    <th>Date</th>
    <th>Size</th>
    <th>Type</th>
	 <th>&nbsp;</th>
  </tr>
  
<?php foreach($photos as $photo):
	if("images/".$authusername == $photo->images_path) {
		
   ?>
  <tr>
    <td><img src="../<?php echo $photo->image_path(); ?>" width="100" /></td>
	 <td><?php echo $photo->image_id; ?></td>    
    <td><?php echo $photo->storyname; ?></td>
	 <td><?php echo $photo->image_name; ?></td>
    <td><?php echo $photo->submission_date; ?></td>
    <td><?php echo $photo->size_as_text(); ?></td>
    <td><?php echo $photo->type; ?></td>
	 <td><a href="delete_photo.php?id=<?php echo $photo->image_id; ?>&name=<?php echo $authusername; ?>">Delete</a></td>
  </tr>
<?php 
	}else{ " "; }
endforeach; ?>
</table>

<?php include('public/footer.php'); ?>
