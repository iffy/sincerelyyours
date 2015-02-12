<?php
require_once('public/initialize.php');
if (!$session->is_logged_in()) { //redirect_to("login.php"); 
?>
<?php include('public/header.php'); ?>

<?php include('public/indexfiller.php'); ?>

<?php }else { ?>
	
<?php include('public/header.php'); ?>	

<?php echo output_message($message); ?>
	<?php $user = new User ();
	$auth_user = $user->find_by_id($session->user_id); 
	$authusername = $auth_user->username;
	$authfirst = $auth_user->firstname;
	$authlast = $auth_user->lastname;	
	echo "<h2>Welcome ".$authfirst." ".$authlast."</h2> <br><br>"; ?>

<?php include('public/indexfiller.php'); ?>

<?php } ?>	
<?php include('public/footer.php'); ?>
		
