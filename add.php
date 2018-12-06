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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["first"])) 
	{
		$emptyErr = "Field is required";
	} 
	else
    {
       $first = test_input($_POST["first"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["second"])) 
	{
		$emptyErr = "Field is required";
	} 
	else
    {
       $second = test_input($_POST["second"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["third"])) 
	{
		$emptyErr = "Field is required";
	} 
	else
    {
       $third = test_input($_POST["third"]);
    }
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
<form action="" method="post">
<select  name="tableSelect" id="tableSelect">
	<option value="">None Selected</option>
	<option value="people">People</option>
	<option value="films">Films</option>
	<option value="TVSeries">TV Series</option>
	<option value="stagePlays">Stage Play</option>
	<option value="pseudonyms">Pseudonyms</option>
	<option value="filmStaff">Film Staff</option>
	<option value="TVStaff">TV Staff</option>
	<option value="stagePlayStaff">Stage Play Staff</option>
</select>
<button onclick="<?php?>">choose table</button>
</form>
<?php
$query = '';
if (isset($_POST['tableSelect']))
{
	$table = $_POST['tableSelect'];
	
	
	
	echo $table;
	
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<?php
	if($table == "people")
	{
		?>
			pID (unique identifier)<br>
			<input type="text" name="first">
			<span class="error">* <?php echo $emptyErr;?> </span><br>
			First Name<br>
			<input type="text" name="second">
			<span class="error">* <?php echo $emptyErr;?> </span><br>
			Last Name<br>
			<input type="text" name="third">
			<span class="error">* <?php echo $emptyErr;?> </span><br>
			Birth Date (can be left empty if unknown)<br>
			<input type="text" name="fourth"><br>
			Death Date (can be left empty if alive)<br>
			<input type="text" name="fifth"><br>
			
			<input type="submit" name="submit" value="button">
		</form>
		<?php
		$birthDate = $fourth;
		
		$deathDate = $fifth;
		
		if($fourth == '')
			$birthDate = 'NULL';
			
		if($fifth == '')
			$deathDate = 'NULL';
		
		$query = 'INSERT INTO people VALUES('.$first.','.$second.','.$third.','.$birthDate.','.$deathDate.')' ;
		
		//echo $query;
	}
	else if($table == "films")
	{
		?>
			fID (unique identifier)<br>
			<input type="text" name="fIDBox"><br>
			Name<br>
			<input type="text" name="fNameBox"><br>
			Release Date (can be left empty if unknown)<br>
			<input type="text" name="fDateBox"><br>
			Budget (can be left empty if unknown)<br>
			<input type="text" name="fBudgetBox"><br>
		<?php
	}
	else if($table == "TVSeries")
	{
		?>
			tID (unique identifier)<br>
			<input type="text" name="tIDBox"><br>
			Name<br>
			<input type="text" name="tNameBox"><br>
			Episode Count<br>
			<input type="text" name="tEpBox"><br>
			Release Date (can be left empty if unknown)<br>
			<input type="text" name="tDateBox"><br>
			Budget (can be left empty if unknown)<br>
			<input type="text" name="tBudgetBox"><br>
		<?php
	}
	else if($table == "stagePlays")
	{
		?>
			sID (unique identifier)<br>
			<input type="text" name="sIDBox"><br>
			Name <br>
			<input type="text" name="sNameBox"><br>
			Release Date (can be left empty if unknown)<br>
			<input type="text" name="sDateBox"><br>
			Budget (can be left empty if unknown)<br>
			<input type="text" name="sBudgetBox"><br>
		<?php
	}
	else if($table == "pseudonyms")
	{
		?>
			pID of a recorded person<br>
			<input type="text" name="pIDBox"><br>
			Pseudonym <br>
			<input type="text" name="pseudonymBox"><br>
		<?php
	}
	else if($table == "filmStaff")
	{
		?>
			pID of a recorded person<br>
			<input type="text" name="pIDBox"><br>
			fID of a recorded film<br>
			<input type="text" name="fIDBox"><br>
			Position (e.g. Director) or Role (e.g. "Nicolas")<br>
			<input type="text" name="roleBox"><br>
		<?php
	}
	else if($table == "TVStaff")
	{
		?>
			pID of a recorded person<br>
			<input type="text" name="pIDBox"><br>
			tID of a recorded TV series<br>
			<input type="text" name="tIDBox"><br>
			Position (e.g. Director) or Role (e.g. "Nicolas")<br>
			<input type="text" name="roleBox"><br>
		<?php
	}
	else if($table == "stagePlayStaff")
	{
		?>
			pID of a recorded person<br>
			<input type="text" name="pIDBox"><br>
			sID of a recorded stage play<br>
			<input type="text" name="sIDBox"><br>
			Position (e.g. Director) or Role (e.g. "Nicolas")<br>
			<input type="text" name="roleBox"><br>
		<?php
	}
	
	
}
echo $query;
?>
</body>
</html>