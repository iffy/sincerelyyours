<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include('public/header.php'); ?>

<?php $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	//echo $authusername;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;	
	echo "<h2>".$authfirst." ".$authlast." your stories</h2> <br><br>";
	?>
	<a href="writestory.php">Write Story</a><br><br>
<?php	
// Find all the stories
  $storys = Story::find_all();	
  
  $photo = Photograph::find_all();
  ?>
  
 	<?php echo output_message($message); ?>
	
	<table class="bordered" width="60%">
  <tr>
    <th>Story Id</th>
    <th>Story Name</th>
    <th>Story</th>
    <th>Date</th>
    <th>Picture</th>
  </tr>
<?php foreach($storys as $story): 
	if($story->name == $authusername) {
	$substringstories = substr($story->stories,0,200);
?>
  <tr>
    <td width="5%" ><a href="showstory.php?id=<?php echo $story->id; ?>"><?php echo $story->id; ?></a></td> 
    <td width="10%" ><?php echo $story->storyname; ?></td>
    <td width="30%" ><?php echo $substringstories; ?> ...</td>
    <td width="10%" ><?php echo $story->date; ?></td>
    <?php
     	$image_id = $story->image_id;
    	$sql="SELECT * from tbl_images where image_id = '{$image_id}'";
		$result = $db->query($sql);	     
      while ($row = $db->fetch_array($result)) {
			$filename = $row['images_path']."/".$row['image_name'];      	
      	if(file_exists($filename)) {
      	echo "<td><img scr='../".$row['$image_path()']."'width='100' /></td>";   //look at list_photos.php & photograph in public
      		}else{
      	echo "<td>Need to Add Picture</td>";
      		}
      	}    	
    	 
    	 ?>
 </tr>
<?php 
}
endforeach; ?>
</table>
	
<?php include('public/footer.php'); ?>