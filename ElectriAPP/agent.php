<?php
session_start();
$id = $_SESSION['identifiant'] ;
$fichier = $_FILES["file"]['tmp_name'] ;

$open = fopen($fichier,'r');
 
while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
	list($IdClient,$IdZone,$consommation,$DateSaisie,$Annee) = $explodeLine;
	$conn = mysqli_connect("localhost","root", "","db_tp2");
	$qry = "insert into consommationannuelle (IdClient,IdZone,consommation,DateSaisie,Annee) values('".$IdClient."','".$IdZone."','".$consommation."','".$DateSaisie."','".$Annee."')";
	mysqli_query($conn,$qry);
}
 
fclose($open);
header("Location: logout.php");
exit();

?>