<?php
include 'database.php';

$sql = "SELECT * FROM `bruger` ";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	$filename = "BackUp.txt";
	$handle = fopen($filename, 'w');
	$ourArray = [[3,5,7,2,1,7,8],  [3,2,1]];
	echo json_encode($ourArray);
	$numresult = mysqli_num_rows($result,$sql);
	
	foreach($row = $numresult
	{
		$id = $row['ID'];
		$name = $row['UserName'];
		$password = $row['Password'];
		$created = $row['Created'];
		$modifyed = $row['Modifyed'];
		fwrite($handle, $id, $name, $password, $created, $modifyed);
	}
	
	fclose($handle);
?>
<h1>Der er nu blevet taget en back up af databasen, filen er gemt som txt fil.</h1>
<?php	     
} 
else 
{
    echo "0 results";
}
