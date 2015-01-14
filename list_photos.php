<?php require_once("public/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
  // Find all the photos
  $photos = Photograph::find_all();
?>
<?php include('public/header.php'); ?>

<h2>Photographs</h2>
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
<?php foreach($photos as $photo):  ?>
  <tr>
    <td><img src="../<?php echo $photo->image_path(); ?>" width="100" /></td>
	 <td><?php echo $photo->image_id; ?></td>    
    <td><?php echo $photo->storyname; ?></td>
	 <td><?php echo $photo->image_name; ?></td>
    <td><?php echo $photo->submission_date; ?></td>
    <td><?php echo $photo->size_as_text(); ?></td>
    <td><?php echo $photo->type; ?></td>
	 <td><a href="delete_photo.php?id=<?php echo $photo->image_id; ?>">Delete</a></td>  <?php // delete not working ?>
  </tr>
<?php endforeach; ?>
</table>
<br />


<?php include('public/footer.php'); ?>
