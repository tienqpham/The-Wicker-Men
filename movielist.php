<?php
/*
$conn = mysqli_connect('localhost', 'root', '', 'cagebase');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM films";
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
?>

<html>
<head>
<title>Movie List</title>
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
		<td>Database ID</td>
		<td>Name</td>
		<td>Release Date</td>
		<td>Budget</td>
	</tr>
	
	<?php
	$query = 'SELECT * FROM films';
	$stid = oci_parse($conn,$query);
	oci_execute($stid,OCI_DEFAULT);
	
	while($row = oci_fetch_array($stid,OCI_ASSOC))
	{
		///*
		echo '<tr>';
		foreach($row as $item)
		{
			echo '<td>' . $item . '</td>';
		}
	}
	/*
		while($films = mysqli_fetch_assoc($results)){
			echo "<tr>";
			echo "<td>{$films['name']}</td>";
			echo "<td>{$films['release_date']}</td>";
			echo "<td>{$films['budget']}</td>";
			echo "</tr>";
		}
		*/
	?>
</table>
</body>
</html>