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

$guestid = $story->guest_id;
var_dump($guestid);  
$imageid = $story->image_id;
  
  $photo = Photograph ::find_by_id($imageid);  
  
  $guest_id = explode(",",$guestid);  //I don't know what I am doing here!!! See var_dumps it looks like it should work.
    for($i = 0; $i < count($guest_id); $i++){
		$sql = "SELECT * FROM tbl_guests WHERE id = '{$i}'" ;    
     	$result = $db -> query($sql);
var_dump($i);			
			if (!$result) {
		echo"Cannot run query";
	  echo mysqli_error($db);
	  	exit;
		}     
     
     }    
     
    ?>

<?php include('public/header.php'); ?>  

<?php echo "<h2>".$authfirst." ".$authlast." your story</h2> <br><br>" ?>
	

<a href="writestory.php">Write Story</a><br><br>
  <table width = 100%>
  <tr>
  <td><h3><?php echo $story->storyname; ?> </td><td></h3></td> 
  </tr>  
  <tr>
  <td><h3>Story Date: <?php echo $story->date; ?></td></h3><td></td> 
  </tr>
  <tr>
  <td>
	<table>
		<tr>
			<td style="white-space: pre-wrap; max-width:500px;"><?php echo htmlentities($story->stories); ?></td>
			<td>&nbsp</td>
			<td>Guest who can see Story:<br><?php while($guest = mysqli_fetch_assoc($result)) { $guest['firstname']." ".$guest['lastname']."<br>";} ?></td> 
			<td>&nbsp</td>
			<td><img src="../<?php echo $photo->image_path(); ?>" /></td> 
		</tr>  	
  	</table>
  </td>
  </tr>
  <tr>
  <td></td><td></td> 
  </tr>
  <tr>
  <td><a href="edit_story.php?id=<?php echo $story->id; ?>">edit</a> <a href="delete_story.php?id=<?php echo $story->id; ?>&name=<?php echo $authusername; ?>">delete</a></td><td></td> 
  </tr>
  </table>
  
  
  <?php include('public/footer.php'); ?>