<HTML>
<head>
<title>Submit Story</title>
<head>
</head>
<body>
<H1>Story Submission</H1>
<FORM NAME ="form" METHOD ="POST" ACTION = "guest.php">
<?PHP
session_start();

$name = $_SESSION['valid_user'];
$gemail = $_POST['gemail'];
$gfirstname = $_POST['gfirstname'];
$glastname = $_POST['glastname'];
$pin = $_POST['pin'];
$server = "localhost";
$username = "root";
$password = "remote99";
$database = "story";


$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later.";
	exit;
	}
	$stmt = $db->prepare("INSERT INTO tbl_guests VALUES (?,?,?,?,?)");
	$stmt->bind_param('sssss', $name, $gemail, $gfirstname, $glastname, $pin);
	$result = $stmt->execute();
if ($result) {
	echo $db->affected_rows ." guest has been inserted into database.";

} else {
	echo "An error has occurred. Your guest was not added.";

}
	$db->close();
?>
<P><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Create Another Guest">
<?PHP include 'menu.php' ?>
</body>
</HTML>
