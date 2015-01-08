<?php
session_start();
if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';
}else{
$username = $_SESSION['valid_user'];
$db = mysqli_connect('localhost','root','remote99','story');
if (mysqli_connect_errno()) {
	echo "Could not connect to database";
	exit;
	}

$query = "select * from tbl_story where name = '$username'";
$result = $db -> query($query);
?>
<html>
<head>
<title>Upload Image</title>
</head>
<body>
<form action="saveimage.php" enctype="multipart/form-data" method="post">
	 
<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody>
<tr>
<td>
Belongs to Story:
</td>
<td>
<input name="uploadedimage" type="file">
</td>
</tr>
<tr>
<td>

<select name="storyname">
<?php
while($row=mysqli_fetch_array($result))
{
?>
<option value="<?php echo $row['storyname']; ?>">
<?php echo $row['storyname']; ?> </option>
<?php } } ?> </select>


</td>
<td>
<input name="Upload Now" type="submit" value="Upload Image">
</td>
</tr>
</tbody>
</table>
</form>
<?PHP include 'menu.php' ?>
</body>
</html>
