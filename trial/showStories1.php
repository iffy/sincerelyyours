<!DOCTYPE html>
<HTML>
</head>
<title>Show your Stories</Title>
<style>
	body{ background-color:lightgrey;}
	table {
    display: table;
    border-collapse: separate;
    border-spacing: 5px;
    border-color: darkgray;
    width:800px;
    display:block;
    height: 400px;
    overflow-y: scroll;
	}

	tbody {
    display: table-row-group;
    vertical-align: top;
    border-color: inherit
	}
	tbody 
    tr:nth-child(even) {
    background: #eee;
    	}
	tbody tr:hover {
    background: yellow;
	}
	td {max-height:100px;}
</style>
<body>
<H1>Show Stories</H1>
<FORM>
<Table>
<TR>
<TD>TITLE</TD>
<TD>STORY</TD>
</TR>
<?PHP
session_start();
if (!isset($_SESSION['valid_user'])) {
	echo "Please login";

}else{
$username = $_SESSION['valid_user'];
$db = mysqli_connect('localhost','root','remote99','story');
if (mysqli_connect_errno()) {
	echo "Could not connect to database";
	exit;
	}

$query = "select * from tbl_story where name = '$username'";
$result = $db -> query($query);

/* while ($row = mysqli_fetch_array($result)) {	
	echo '<div>' . $row['storyname'] . $row['stories'] . '</div>';

	} */
while ($row = mysqli_fetch_array($result)) {	
	echo '<tr><td><a href=>' . $row['storyname'] .'</a></td><td>'. $row['stories'] .'</td></tr>';

	}
}

?>

</Table>
</form>
<html>

