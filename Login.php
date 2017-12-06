<html>
<h1> Log in </h1>
<form method="post" action= "login.php">
	Bruger navn:  <input type="text" required name="Username"></input>
	<br>
	Password: <input type="password" required name="Password"></input><br>
	<input type="submit" value="Sign In" name="submit">
</form>
<form action="OpretBruger.php">
	<input type="submit" value="Har du ikke en bruger?">
</form>
</html>
<?php
	include 'Database.php';
if (isset($_POST['submit'])){
	global $userName;
	$userName = $_POST["Username"];
	$passWord = $_POST["Password"];
	$sql = "SELECT * FROM `bruger` WHERE UserName = '$userName' AND Password = '$passWord'";
	$result = mysqli_query($conn,$sql);
	//sql->query($sql); 
	if (mysqli_num_rows($result) >= 1)
	{
		session_start();
		//$fullsql = "SELECT * FROM 'bruger' WHERE UserName = '$userName'";
		$result = $conn->query($sql);
		$row = $result-> fetch_assoc();
		$_SESSION['BrugerID'] = $row['ID'];
		$_SESSION['UserName'] = $userName;
		header('Location: ClintSideProg/Homepage.html');
	}
	else
	{	
		echo "Forkert kode eller kode!";
	}

}










?>