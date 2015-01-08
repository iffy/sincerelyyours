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
	td {max-height:80px;}
</style>
<body>
<center><H1>Show Stories</H1></center>
<FORM>
<Table>
<TR>
<TD>TITLE</TD>
<TD>STORY</TD>
</TR>
<?PHP
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


while ($row = mysqli_fetch_array($result)) {	
	echo '<tr><td><a href=>'.$row['storyname'].'</a></td><td>'. substr($row['stories'],0,300).'</td></tr>';

	}
}

?>
</Table>
<br><center>
<?PHP include 'menu.php' ?>
</form>
<html>

