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
<title>Write Your Story</title>
</head>
<body>
<FORM NAME ="form" METHOD ="POST" ACTION = "submitForm.php">
<TABLE style="width:70%">
<TR>
<TD>Your Name:</TD>
<TD><?PHP echo $firstname .' '. $lastname;?></TD>
<TD></TD>
<TD></TD>
<TD><a href="http://www.merriam-webster.com" target="_blank">A Dictionary for Help</a></TD>
</TR>
<TR>
<TD>Story Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="storyname"></TD>
<TD>Send Story to:</TD>
<TD></TD>
<TD><a href="http://www.thesaurus.com" target="_blank">A Thesaursus for Help</a></TD>
</TR>
<TR>
<TD></TD>
<TD><textarea spellcheck="true" Name ="stories" rows="20" cols="70">Type your story here!</textarea></TD>
<TD><?PHP
$query = "select * from tbl_guests where username = '$username'";
$result1 = $conn -> query($query);

while ($row = mysqli_fetch_array($result1)) {	
?>
	<div><input name="checkbox[]" type= "checkbox" id="checkbox[]" value"<?PHP echo $row['gemail']; ?>">
	<?PHP echo  $row['gfirstname'] .' '.$row['glastname'] . '</div>'; 

	}
?></TD>
<TD></TD>
</TR>
<TR>
<TD></TD>
<TD><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Submit Story"></TD>
<TD></TD>
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
