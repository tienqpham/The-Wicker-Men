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

<?php

$fid = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["textbox"])) 
	{
		$nameErr = "Please provide film's table ID";
	} 
    else 
    {
       $fid = test_input($_POST["textbox"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
		<td>Table ID</td>
		<td>Name</td>
		<td>Release Date</td>
		<td>Budget</td>
	</tr>
	
	<?php
	$query = 'SELECT * FROM films';
	$stid = oci_parse($conn,$query);
	oci_execute($stid,OCI_DEFAULT);
	
	while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
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
<br><br><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="textbox">
<span class="error">* <?php echo $nameErr;?> </span>
<br>
<input type="submit" name="getFilmStaff" value="get staff">
</form>

<table  width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Position</td>
	</tr>
	
	<?php
	//filmStaff : pID, fID, role
	$query1 = 'SELECT pID, role FROM filmStaff WHERE fID = ' .  $fid;
	$stid1 = oci_parse($conn,$query1);
	oci_execute($stid1,OCI_DEFAULT);
	
	while($row = oci_fetch_array($stid1,OCI_ASSOC+OCI_RETURN_NULLS))
	{
		$i = 1;
		echo '<tr>';
		foreach($row as $item)
		{
			if($i == 1)
			{
				$pid = $item;
				$query2 = 'SELECT firstName, lastName FROM people WHERE pID = ' .  $pid;
				$stid2 = oci_parse($conn,$query2);
				oci_execute($stid2,OCI_DEFAULT);
				while($subRow = oci_fetch_array($stid2,OCI_ASSOC+OCI_RETURN_NULLS))
				{
					foreach($subRow as $subItem)
					{
						echo '<td>' . $subItem . '</td>';
					}
				}
			}
			else
			{
				echo '<td>' . $item . '</td>';
			}
			$i++;
		}
		echo '</tr>';
	}
	?>

</table>

</body>
</html>