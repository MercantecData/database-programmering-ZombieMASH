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
if (isset($_POST['submit']))
{
	$userName = $_POST["Username"];
	$sql = "SELECT * FROM `bruger` WHERE UserName = '$userName'";
	//Finder den bruger der prøver at logge på og se hvad hashkode han har \\
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$hashPassword = $row['Password'];
	// End of hashkode \\
	
	if (password_verify($_POST["Password"], $hashPassword))
	{
		session_start();
		$result = $conn->query($sql);
		$row = $result-> fetch_assoc();
		$_SESSION['BrugerID'] = $row['ID'];
		$_SESSION['UserName'] = $userName;
		header('Location: ClintSideProg/Homepage.html');
	}
	else
	{	
		echo "Forkert brugernavn eller kode!";
	}
}










?>