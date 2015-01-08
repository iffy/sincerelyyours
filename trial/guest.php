<?PHP
session_start();

if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';

}else{
$username = $_SESSION['valid_user'];

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
<title>Include Guess</title>
</head>
<body>

<FORM NAME ="form" METHOD ="POST" ACTION = "guest1.php">
<TABLE style="width:70%">
<TR>
<TD>Your Name:</TD>
<TD><?PHP echo $firstname .' '. $lastname;?></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD>Guest Email Address:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="gemail"></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD>Guest First Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="gfirstname"></TD>
<TD></TD>
</TR>
<TR>
</TR>
<TR>
<TD>Guest Last Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="glastname"></TD>
<TD></TD>
</TR>
<TR>
<TD>PIN Number:<BR>(4 digits only)</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="pin"></TD>
<TD></TD>
</TR>
</TR>
<TR>
<TD></TD>
<TD><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Save Guest"></TD>
<TD></TD>
<TD></TD>
</TR>
</TABLE>
</FORM>
<?PHP include 'menu.php' ?>
</body>
</html>
<?PHP
}
?>
