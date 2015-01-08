<?PHP
session_start();

$username=$_POST["username"];
$password=$_POST["password"];


if ((!isset($username)) || (!isset($password))) {
?>

<HTML>
<TITLE>User Login</TITLE>
<body>
<BR>
<H1>User Login</H1>
<BR>
<BR>
<FORM METHOD ="POST" ACTION = "login.php">

<Table style="width:70%">
<TR>
<TD></TD>
<TD></TD>
<TD></TD>
<TD><a href="registration.php">User Registration</a></TD>
</TR>
<TR>
<TD>User Name:</TD>
<TD><INPUT TYPE=text Value=' ' Name="username"></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD>Password:</TD>
<TD><INPUT TYPE="password" VALUE ='' Name ="password"></TD>
<TD></TD>
<TD></TD>
</TR>
<TR>
<TD colspan=2><center><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Submit Login"></center></Form></TD>
<TD></TD>
<TD></TD>
</TR>
</Table>
</body>
</HTML>
<?PHP
}else{
	
	$_SESSION['valid_user'] = $username;
	$mysql = mysqli_connect('localhost','root','remote99');
	if (!$mysql) {
		echo"Cannot connect to Database. Try again later.";
		exit;
	}

	$selected = mysqli_select_db($mysql, 'story');
	if (!$selected){
		echo"Cannot select Database";
		exit;
	}

	$passwordHash = sha1($password);
	
	$query = "select count(*) from auth where username = '$username' and password = '$passwordHash'";
	
	$result = mysqli_query($mysql, $query);
	if (!$result) {
		echo"Cannot run query";	
		exit;
	}

	$row = mysqli_fetch_row($result);
	$count = $row[0];
		
	if ($count > 0) {
		require('index2.php');
	}else{
		echo"<H1>Try again</H1>";
	}
}
?>
