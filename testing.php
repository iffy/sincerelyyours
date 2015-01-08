<?php
require_once("public/initialize.php"); ?>
<?php include('public/header.php'); ?>

<?php
$user = User::find_by_id(1);
echo $user->fullname();

echo"<hr ?>";

$users = User::find_all();
foreach($users as $user) {
  echo "User: ". $user->username ."<br />";
  echo "Name: ". $user->fullname() ."<br />";
  echo "Email: ". $user->email ."<br /><br />";
}

?>
<?php include('public/footer.php'); ?>
