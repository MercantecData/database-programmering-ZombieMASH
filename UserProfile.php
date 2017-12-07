<?php
include 'database.php';
session_start();

$str = $_SESSION['UserName'];
$upperName = strtoupper($str);

$userID = $_SESSION['BrugerID'];

$sql = "SELECT * FROM `bruger` WHERE ID = '$userID'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
?>

<html>
	<header>
		<link rel="stylesheet" type="text/css" href="ClintSideProg/Stylesheet.css"> 
	</header>
	<h1 id="Header" style="color: Black;"><center> DU ER LOGGET IND SOM <?php echo $upperName ?> </center></h1>
<body>
<div style="width: 49.5%; float:left; border: 1px solid black;">
<h1> Om dig </h1>
<p style= "padding-left: 5px;">Navn: <?php echo $row['Navn']; ?> </p>
<p style= "padding-left: 5px;">Efternavn: <?php echo $row['EfterNavn']; ?> </p>
<p style= "padding-left: 5px;">Alder: <?php echo $row['Alder']; ?> </p>
<p style= "padding-left: 5px;">Antal dyr: <?php echo $row['Husdyr']; ?> </p>
<p style= "padding-left: 5px;">Bruger siden: <?php echo $row['Created']; ?> </p> <br>
</body>
<body>
<form action="login.php" style="width: 10%; float: left;">
    <input type="submit" value="Log ud" />
</form>

<form action="ClintSideProg/Homepage.html" style="width: 13.5%; overflow: hidden;">
	<input type="submit" value="Tilbage" />
</form>

</body>
</div>
<!-- Edit Profil -->
<body>
<div style="width: 49.5%; overflow: hidden;padding-left:8px;  border: 1px solid black;">
<h1> Ændre oplysninger </h1>
<form action= "UserProfile.php" method="POST">
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
	<br>
	<input type="submit" value="Edit profil" name="submit">
</form>
<p> De dele du ikke ændre, forandre sig ikke. </p>
</body>
</div>
<!-- End of Edit Profil -->
</html>
<?php
// PHP side of edit profile \\
function EditUser(){
	include 'Database.php';
	
	// Connect to the database and geather the infomation about the user who locked in \\
	$userID = $_SESSION['BrugerID'];
	$sql = "SELECT * FROM `bruger` WHERE ID = '$userID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	// End of the connect to database... \\	
	
	// Declare variable \\
	$Navn = $_POST["Navn"];
	$Alder = $_POST["Alder"];
	$EfterNavn = $_POST["Efternavn"];
	$Husdyr = $_POST["Husdyr"];
	$userName = $_POST["Username"];
	// End of Declare variable \\	
	
	//Check if the username and passwords are the same \\
	$RealuserName = $row['UserName'];
	$hashPassword = $row['Password'];
	
	
	
	if ($RealuserName == $userName and password_verify($_POST["Password"], $hashPassword))
	// End of the info check \\
	{
		// Make sure every variable is filled out and send to the database \\
		if($Navn == null || $Navn == "")
		{
			$Navn = $row['Navn']; // Return value to what it was before \\
		}
		if($EfterNavn == null || $EfterNavn == "")
		{
			$EfterNavn = $row['EfterNavn']; // Return value to what it was before \\
		}
		if($Alder == null || $Alder == ""  || $Alder <= 0)
		{
			$Alder = $row['Alder']; // Return value to what it was before \\
		}
		if($Husdyr == null || $Husdyr == "" || $Husdyr <= 0)
		{
			$Husdyr = $row['Husdyr']; // Return value to what it was before \\
		}
		// The update query!! Be carefull, you can edit your whole database at once \\	
		$sql = "UPDATE bruger SET  
								Navn = '$Navn', 
								EfterNavn = '$EfterNavn', 
								Alder = '$Alder', 
								Husdyr = '$Husdyr' 
								WHERE ID = '$userID'";
		$conn->query($sql);	
		// End of Update query \\
		// End of variable filled out \\
	}
}
// End of PHP edit profile \\
if(isset($_POST['submit']))
{
	EditUser();
	header('Location: UserProfile.php');
}
?>
<html>
<link rel="stylesheet" type="text/css" href="ClintSideProg/Stylesheet.css"> 
<br><br>
	<body>
		<div style="width: 49.5%; float:left; border: 1px solid black;">
			<h1>Opret en status</h1>

<form method="post" action="UserProfile.php">
	<textarea cols="50" rows="5" name="besked" style="padding-left: 5px;"> </textarea>
	<input type="submit" value="Opdate" name="statusOpdate">
</form>
</div>
</body>
<body>
	<div style="width: 49.5%; overflow: hidden;padding-left:8px;  border: 1px solid black;">
		<h1> Dine status'er </h1>
		<!-- Viser alle ens bedskedder -->
		<?php
		$userID = $_SESSION['BrugerID'];
		$sql = "SELECT status.Status,status.Created FROM `status` WHERE OwnerID = '$userID'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) 
		{
			echo "<p style='overflow: visible; word-wrap: break-word'>" . $row['Created'] . "<br>" . $row['Status'] . "</p>";
		}
		?>
		<!-- End of viser alle bedskedder -->
	</div>
</body>
</html>
<?php
	//Laver en status \\
if(isset($_POST['statusOpdate']))
	{
		$userID = $_SESSION['BrugerID'];
		$status = $_POST['besked'];
		$sql = "INSERT INTO `status` (`Status`, `OwnerID`) VALUES ('$status','$userID')";
		$conn->query($sql);
		header('Location: UserProfile.php');
	}
	// End of Laver status \\
?>
