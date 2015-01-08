<?php require_once("public/initialize.php"); ?>
<?php	
    $session->logout();
    redirect_to("login.php");
?>
