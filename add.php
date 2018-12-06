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
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<select name= "tableSelect" id="tableSelect">
	<option value="people">People</option>
	<option value="films">Films</option>
	<option value="TVSeries">TV Series</option>
	<option value="stagePlays">Stage Play</option>
	<option value="pseudonyms">Pseudonyms</option>
	<option value="filmStaff">Film Staff</option>
	<option value="TVStaff">TV Staff</option>
	<option value="stagePlayStaff">Stage Play Staff</option>
</select>
<br><br>
People:		 		pID, firstName, lastName, birthDate, deathDate<br>
Films: 		 		fID, name, releaseDate, budget<br>
TVSeries: 	 		tID, name, episodes, releaseDate, budget<br>
stagePlays:  		sID, name, releaseDate, budget<br>
Pseudonyms:  		pID, fullName<br>
filmStaff:   		pID, fID, role<br>
TVStaff: 	 		pID, fID, role<br>
stagePlayStaff: 	pID, fID, role<br><br>
date format: dd-MON-yy)<br>

<br><br>
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
  <input type="submit" name="submit" value="Submit">
</form> 

<br>
Your query:
<br>

<?php
$query;
$table = $_POST["tableSelect"];
$first = $_POST["firstentry"];
$second = $_POST["secondentry"];
$third = $_POST["thirdentry"];
$fourth = $_POST["fourthentry"];
$fifth = $_POST["fifthentry"];
if($table == 'people' || $table == 'TVSeries')
{
	$query = 'INSERT INTO '.$table.' VALUES( '.$first.','.$second.','.$third.','.$fourth.','.$fifth.')';
}
else if($table == 'films' || $table == 'stagePlays')
{
	$query = 'INSERT INTO '.$table.' VALUES( '.$first.','.$second.','.$third.','.$fourth.')';
}
else if($table == 'filmStaff' || $table == 'TVStaff' || $table == 'stagePlayStaff')
{
	$query = 'INSERT INTO '.$table.' VALUES( '.$first.','.$second.','.$third.')';
}
else if($table == 'pseudonyms')
{
	$query = 'INSERT INTO '.$table.' VALUES( '.$first.','.$second.')';
}

echo $query;
?>
</body>
</html>
