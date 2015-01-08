<?PHP
session_start();

$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["pass1"];
$password2=$_POST["pass2"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];


if ((!isset($email)) || (!isset($username))) {
?>

<HTML>
<TITLE>User Registration</TITLE>
<body>
<H1>User Registration</H1>

<FORM NAME ="form" METHOD ="POST" ACTION = "registration.php">

<Table>
<TR>
<TD>*First Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE ='' Name ="firstname"></TD>
</TR>
<TR>
<TD>*Last Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE ='' Name ="lastname"></TD>
</TR>
<TR>
<TD>*User Name:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="username"></TD>
</TR>
</TR>
<TR>
<TD>*Email Address:</TD>
<TD><INPUT TYPE = "TEXT" VALUE =' ' Name ="email"></TD>
<TR>
<TR>
<TD>*Password:<BR>(between 6 and 16 char.)</TD>
<TD><INPUT TYPE = "password" VALUE =' ' Name ="pass1"></TD>
</TR>
<TR>
<TD>*Confirm Password:</TD>
<TD><INPUT TYPE = "password" VALUE ='' Name ="pass2"></TD>
<TD spancol=2><center><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Register"></center></Form></TD>
</TR>
</Table>
</body>
</HTML>
<?PHP
}else{

	$_SESSION['valid_user'] = $username;
	if ($password != $password2){ 
		echo "Passwords do not match try again";
		exit;
	}
	if (!$fistname){
		echo"First Name Needed";
		exit;
	}
	if (!$lastname){
		echo"Last Name Needed";
		exit;
	}
	if (!$username){
		echo"User Name Needed";
		exit;
	}
	if (!$email){
		echo"Email Address Needed";
		exit;
	}
	if (!$pass1){
		echo"Password Needed";
		exit;
	}

 
	if ((isset($firstname)) || (isset($lastname)));

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

	$query = "select count(*) from auth where username = '$username' and email = '$email'";
		
	$result = mysqli_query($mysql, $query);
	if (!$result) {
		echo"Cannot run query";	
		exit;
	}

	$row = mysqli_fetch_row($result);
	$count = $row[0];
		
	if ($count > 0) {
		echo"<H1>Username and Email already exist please try again</H1>";
		exit;

	}else{

		$passwordHash = sha1($password);

		$db = mysqli_connect('localhost','root','remote99','story');
		if (mysqli_connect_errno()){
			echo "Error: Could not connect to database. Please try again later.";
			exit;
			}
		$stmt = $db->prepare("INSERT INTO auth VALUES (?,?,?,?,?)");
		$stmt->bind_param('sssss',$username,$passwordHash,$email,$firstname,$lastname);
		$result1 =$stmt->execute();
		
		if ($result1) {
		echo $db->affected_rows ." Information inserted into database.";
		$dir_path = "images/".$username;
		mkdir($dir_path, 0777);		
		require('index2.php');
		}
	}
}
?>

