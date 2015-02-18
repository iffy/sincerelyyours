<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php");} 
?>

<?php include('public/header.php'); ?>	


	 

<?php echo output_message($message); ?>
	<?php $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;	
	echo "<h2>Welcome ".$authfirst." ".$authlast."</h2> <br><br>"; 
	?>
	
<h2>Getting Started</h2>

<div>
Learning a website is often the most difficult part of any undertaking. Below you will
find the process line out step by step.
<br>
<br>
&nbsp 1. Register for free and create and login and password
<br>
<br>
&nbsp 2. Login and select Show Guest. At the top of the page you will find a link that will allow you to <a href="create_guests.php">Create a Guest</a>.<br>
&nbsp Fill out first name, last name, email and relation. 
<br>
<br>

&nbsp 3. Select Stories and the bottom of the page. At the top of this story page you will find a link
which will allow to <a href="writestory.php">write a story</a>.
<br>
<br>
&nbsp 4. When writing your story make sure your title is and date are filled out; then write your story.
<br>
&nbsp &nbsp A. Notes about writing stories:
<br>
&nbsp &nbsp &nbsp You can type your story in he given box, or you can cut and paste the story in the box " and '
may give you trouble. 
<br>&nbsp &nbsp &nbsp Please use \" or \' to get around the trouble. Example Grampa\'s knife or \"This\" is in quotes.
<br>&nbsp &nbsp &nbsp Select the guest you would like to view that specific story.
<br>&nbsp &nbsp &nbsp You can edit the story or the guest a any time.

<br>
<br>
&nbsp 5. Next select Upload Photo. Select the image you would like to upload and the story you want it to belong to,<br>
&nbsp give it a name and a date and submit the photo. You will then see the image in a list that you can review any time.
<br>
<br>
&nbsp 6. To view your story simply select stories and the title of the story and you will see your story and image on the page.
<br>
<br>
HINT: if you are not ready to send you stories out to your family and friends DO NOT select them as guests until 
<br>after the story is complete and you are ready to send the story. Once you select the guests ans submit the stories
<br>you friends and families will receive an email with information about this story. 
</div>
	
	
<?php include('public/footer.php'); ?>