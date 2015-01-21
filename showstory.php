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
	?>
	
<?php	
// Find story by id
  $story = Story::find_by_id($id);	
    ?>

<?php include('public/header.php'); ?>  

<?php echo "<h2>".$authfirst." ".$authlast." your story</h2> <br><br>" ?>
	

<a href="writestory.php">Write Story</a><br><br>
  <table width = 60%>
  <tr>
  <td><?php echo $story->storyname; ?> </td><td></td> 
  </tr>  
  <tr>
  <td>&nbsp; </td><td></td> 
  </tr>
  <tr>  
  <td><?php echo $story->stories; ?> </td><td></td>
  </tr>
  <tr>
  <td>&nbsp; </td><td></td> 
  </tr>
  <tr>
  <td><a href="edit_story.php?id=<?php echo $story->id; ?>">edit</a> delete</td><td></td> 
  </tr>
  </table>
  
  
  <?php include('public/footer.php'); ?>