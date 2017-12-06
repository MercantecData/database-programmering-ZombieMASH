<html>
<h1> Opret Bruger </h1>
<form method="post" action= "OpretBruger.php">
	Bruger navn*:  <input type="text" required name="Username"></input>
	<br>
	Password*: <input type="password" required name="Password"></input>
	<br>
	Navn:  <input type="text" name="Navn"></input>
	<br>
	Efternavn:  <input type="text" name="Efternavn"></input>
	<br>
	Alder:  <input type="text" name="Alder"></input>
	<br>
	Husdyr:  <input type="text" name="Husdyr"></input>
	<br>
	
	<input type="submit" value="Sign In" name="submit">
</form>


<?php
function createNewUser(){
	include 'Database.php';
	$userName = $_POST["Username"];
	$passWord = $_POST["Password"];
	$Navn = $_POST["Navn"];
	$Efternavn = $_POST["Efternavn"];
	$Alder = $_POST["Alder"];
	$Husdyr = $_POST["Husdyr"];
	
	
	$sql = "SELECT UserName from bruger WHERE UserName = '$userName'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO bruger (UserName, Password, Navn, EfterNavn, Alder, Husdyr) VALUES ('$userName', '$passWord', '$Navn' , '$Efternavn', '$Alder', '$Husdyr')";
		$conn->query($sql);
		echo '<h1> Du har nu oprettet en bruger </h1><br>';
		echo '<a href="login.php"> Log in here </a>';
	}
	else{
		echo "Du kan ikke bruge det brugernavn, prøv et andet.";
	}
}
if(isset($_POST['submit']))
{
   createNewUser();
} 
?>
</html>