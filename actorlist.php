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

$query = "SELECT * FROM people";
$stid = oci_parse($conn,$query);
$results = oci_execute($stid,OCI_DEFAULT);

?>

<html>
<head>
<title>Actor List</title>
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
  <a href="temp.php">Add Data</a>
  <a href="login.php">Logout</a>
</div>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Birth Date</td>
		<td>Death Date</td>
	</tr>
	
	<?php
		while($films = oci_fetch_assoc($results)){
			echo "<tr>";
			echo "<td>{$films['firstName']}</td>";
			echo "<td>{$films['lastName']}</td>";
			echo "<td>{$films['birthDate']}</td>";
			echo "<td>{$films['deathDate']}</td>";
			echo "</tr>";
		}
		
		oci_free_statement($stid);
		oci_close($conn);

	?>
</table>
</body>
</html>