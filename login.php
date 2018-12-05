<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Wicker Men</title>
<style type="text/css">
body{
	background:#000000;
	font-size:17px;
	font-family:Verdana, Geneva, sans-serif;
}

table{
	background:#FFF;
	margin-top:15%;
	border:#666 1px solid;
	border-radius:5px;
	padding:0px;
}

th{
	background:#FFF;
}

td{
	padding:10px;
}

input[type=text], input[type=password] {
    border-left:5px #FF900 solid;
}

input[type=submit]{
	border-radius:2px;
	height:25px;
	border:none;
}

</style>
</head>

<?php
session_start();
if(isset($_POST['btn_submit'])){
	
	$username = $_POST['user'];
	$password = $_POST['pass'];
		
	if($username == "admin" && $password == "admin"){
		$_SESSION['status'] = "Active";
		header('location: index.php');
	}
	else{
		header("location:login.php?status=false");
	}
}
?>
<form action="" method="post">
<table align="center">
	<tr>
		<th colspan="2">Login</th>
	</tr>
	<?php
		if(isset($_GET['status']) && $_GET['status'] == "false"){
	?>
	<tr>
		<td colspan="2" align="center"><font size="2" color="#FF0000">Wrong Username or Password!</font></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td>Username :</td><td><input type="text" name="user" /></td>
	</tr>
	<tr>
		<td>Password :</td><td><input type="password" name="pass" /></td>
	</tr>
	<tr>
		<td></td><td><input type="submit" name="btn_submit" value="Login"/></td>
	</tr>
</table>
</form>
</body>
</html>