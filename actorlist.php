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
  <a href="add.php">Add Data</a>
</div>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<td>Table ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Birth Date</td>
		<td>Death Date</td>
		<td>Pseudonyms</td>
	</tr>
	
	<?php
	$query = 'SELECT * FROM people';
	$stid = oci_parse($conn,$query);
	oci_execute($stid,OCI_DEFAULT);
	
	while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
	{
		$i = 0;
		$id;
		///*
		echo '<tr>';
		foreach($row as $item)
		{
			//echo var_dump($item);
			if($i == 0)
			{
				$id = $item;
			}
			$i++;
			echo '<td>' . $item . '</td>';
		}
		if($i > 0)
		{
			$j = 0;
			echo '<td>';
			$query2 = 'SELECT name FROM pseudonyms WHERE pID = ' . $id;
			$stid2 = oci_parse($conn,$query2);
			oci_execute($stid2,OCI_DEFAULT);
			while($record = oci_fetch_array($stid2,OCI_ASSOC+OCI_RETURN_NULLS))
			{
				foreach($record as $item)
				{
					if($j > 0)
						echo ', ';
					$j++;
					echo $item;
				}
			}
			echo '</td>';
		}
		echo '</tr>';
		//*/
			/*
			echo "<tr>";
			echo "<td>{$row[0]}</td>";
			echo "<td>{$row[1]}</td>";
			echo "<td>{$row[2]}</td>";
			echo "<td>{$row[3]}</td>";
			echo "<td>{$row[4]}</td>";
			echo "</tr>";
			*/
	}
		
	oci_free_statement($stid);
	oci_close($conn);

	?>
</table>
</body>
</html>