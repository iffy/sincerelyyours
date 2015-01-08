<?PHP
session_start();
$username = $_SESSION['valid_user'];

if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';

}else{

$conn = mysqli_connect('localhost','root','remote99');
	if (!$conn) {
		echo"Cannot connect to Database. Try again later.";
		exit;
		}

	$sql = "select lastname, firstname from auth where username = '$username'";
	
	mysqli_select_db($conn, 'story');	

	$result = $conn -> query($sql);
	if (!$result) {
		echo"Cannot run query";
	echo mysqli_error($conn);
		exit;
		}
	$row = mysqli_fetch_array($result);
	$lastname = $row['lastname'];
	$firstname = $row['firstname'];

?>
<html>
<head>
<title>Welcome</title>
</head>
<body>

<TABLE>
<TR>
<TD>Welcome:</TD>
<TD><?PHP echo $firstname .' '. $lastname;?></TD>
<TD></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD></TD>
<TD></TD>
<TD></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD></TD>
<TD></TD>
<TD></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD></TD>
<TD></TD>
<TD><?PHP include 'menu.php' ?></TD>
<TD></TD>
<TD></TD>
</TR>

</TABLE>
</FORM>

</body>
</html>
<?PHP
}
?>
