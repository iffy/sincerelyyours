<?php
$server="localhost";
$database="story";
$username="root";
$password="remote99";
$storyname = $_POST['storyname'];

session_start();

if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';

}else{

$name = $_SESSION['valid_user'];

$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later.";
	exit;
	}
 
    function GetImageExtension($imagetype)
     {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     } 

if (!empty($_FILES["uploadedimage"]["name"])) {
 
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
//    $imagename=date("m-d-Y")."-".time().$ext;
    $imagename=$file_name.$ext;
    $target_path = "images/".$name."/".$imagename;
     
if(move_uploaded_file($temp_name, $target_path)) {

	$date = date("m-d-Y");    
	
	$stmt = $db->prepare("INSERT INTO tbl_images VALUES (NULL,?,?,?,?)");
	$stmt->bind_param('ssss', $name, $imagename, $date, $storyname);
	$result = $stmt->execute();
if ($result) {
	?><a href="basicForm2.php">Write A Story</a><?PHP

} else {
	exit("Error While uploading image on the server");

}
	 
}
}
}
?>
