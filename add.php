<?php
/*
$conn = mysqli_connect('localhost', 'root', '', 'cagebase');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM people";
$results = mysqli_query($conn, $sql);

*/

$username = 'hmalloy';
$password = '1amb0ss.';
$conn = oci_connect($username, $password, '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

if(!$conn)
{
	$message = oci_error();
	echo $message, "\n";
	exit;
}

session_start();
if($_SESSION['status']!="Active"){
    header("location:login.php");
}

?>
<html>
<head>
<title>Add Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family:Verdana, Geneva, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #339900;
  color: white;
}
</style>
</head>

<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="actorlist.php">Actor List</a>
  <a href="movielist.php">Movie List</a>
  <a href="tvseries.php">Tv Series</a>
  <a href="add.php">Add Data</a>
  <a href="search.php">Search</a>
  <a href="logout.php">Logout</a>
</div>
<select>
	<option value="people">People</option>
	<option value="films">Films</option>
	<option value="tv">TV Series</option>
	<option value="stage">Stage Play</option>
	<option value="pseudonyms">Pseudonyms</option>
	<option value="filmStaff">Film Staff</option>
	<option value="tvStaff">TV Staff</option>
	<option value="stageStaff">Stage Play Staff</option>
</select>
<form>
  First Entry (ID):<br>
  <input type="text" name="firstentry"><br>
  Second Entry:<br>
  <input type="text" name="secondentry"><br>
  Third Entry:<br>
  <input type="text" name="thirdentry"><br>
  Fourth Entry:<br>
  <input type="text" name="fourthentry"><br>
  Fifth Entry:<br>
  <input type="text" name="fifthentry"><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>
