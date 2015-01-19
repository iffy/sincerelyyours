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
  $storys = Story::find_all();	?>
  
  <?php
  // Find photos by storyname
  //$photos = Photograph::find_by_storyname();
?>
	
	<?php echo output_message($message); ?>
	
	<table class="bordered" width="60%">
  <tr>
    <th>Story Id</th>
    <th>User</th>
    <th>Story Name</th>
    <th>Story</th>
    <th>Date</th>
    <th>Picture</th>
  </tr>
<?php foreach($storys as $story): 
	if($story->name == $authusername) {
	$substringstories = substr($story->stories,0,300);
		
	//$photos = $storystoryname;
?>
  <tr>
    <td width="5%" ><a href="showstory.php?id=<?php echo $story->id; ?>"><?php echo $story->id; ?></a></td> 
    <td width="5%" ><?php echo $story->name; ?></td>
    <td width="10%" ><?php echo $story->storyname; ?></td>
    <td width="30%" ><?php echo $substringstories; ?> ...</td>
    <td width="10%" ><?php echo $story->date; ?></td>
    <td width="5%"><img src="images/<?php echo $photos; ?>" width="100" /></td>
 </tr>
<?php 
}
endforeach; ?>
</table>
	
	
<?php include('public/footer.php'); ?>