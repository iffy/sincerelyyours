<HTML>
<head>
<title>Submit Story</title>
<head>
</head>
<body>
<H1>Story Submission</H1>
<FORM NAME ="form" METHOD ="POST" ACTION = "showStories.php">
<?PHP
session_start();

$name = $_SESSION['valid_user'];
$storyname = $_POST['storyname'];
$stories = $_POST['stories'];
$today = date('m-d-y');
$gemail = $_POST['gemail'];
$server = "localhost";
$username = "root";
$password = "remote99";
$database = "story";

$guestmail = array($gemail);

$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later.";
	exit;
	}
	$stmt = $db->prepare("INSERT INTO tbl_story VALUES (NULL,?,?,?,?,?)");
	$stmt->bind_param('sssss', $name, $storyname, $stories, $today, $guestmail);
	$result = $stmt->execute();
if ($result) {
	echo $db->affected_rows ." story has been inserted into database.";

} else {
	echo "An error has occurred. Your story was not added.";

}
	$db->close();
?>
<P><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Show Stories">

</body>
</HTML>
