<?php
session_start();

$server="localhost";
$database="story";
$username="root";
$password="remote99";

if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';

}else{

$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later.";
	exit;
	}
 
$select_query = "SELECT images_path FROM  tbl_images ORDER by image_id DESC";
$sql = mysql_query($select_query) or die(mysql_error());   
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){
 
?>
 
<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellpadding="5" cellspacing="5">
<tbody><tr>
<td>
 
<img src="<?php echo $row['images_path']?> ">
 
</td>
</tr>
</tbody>
</table>

<?php
}
}
?>
<br><center>
<?PHP include 'menu.php' ?>
 
