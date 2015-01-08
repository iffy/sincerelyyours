<!DOCTYPE html>
<HTML>
</head>
<title>Show your Images</Title>
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
<center><H1>View Images</H1></center>
<FORM>
<Table>
<TR>
<TD></TD>
<TD>Images</TD>
</TR>
<?php
session_start();

$server="localhost";
$database="story";
$username="root";
$password="remote99";

if (!isset($_SESSION['valid_user'])) {
	include 'menu1.php';


}else{

$db = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database. Please try again later.";
	exit;
	}
 
$query = "SELECT * FROM  tbl_images ORDER by image_id DESC";
$result = $db -> query($query);
   
while ($row = mysqli_fetch_array($result)) {	
	echo '<tr><td><a href=>' . $row['image_id'] .'</a></td><td>'. $row['images_path'] .'</td></tr>';

	}
}

?>
</Table>
<br><center>
<?PHP include 'menu.php' ?>
 
