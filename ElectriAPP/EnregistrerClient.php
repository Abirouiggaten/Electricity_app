<?php
$id=$_POST["id"];
$pswd=$_POST["pswd"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$adrs=$_POST["adrs"];
$tel=$_POST["tel"];
$numcontract=$_POST["numcontract"];
$zone=$_POST["zone"];
$modif=$_POST["modifier"];




$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
 if($modif == "modifier"){
    $sql = "UPDATE client SET Pswd='$pswd',Nom='$nom',Prenom='$prenom',Mail='$adrs',Tel='$tel',DateDebutCtr='$numcontract',IdZone='$zone'   WHERE IdClient='$id' " ;
 } else{
    $sql = " INSERT INTO client values ('$id','$pswd','$nom','$prenom','$adrs','$tel','$numcontract','$zone') " ;
 }

//  if ($conn->query($sql) === TRUE) {
//     echo "ooookkkk" ;
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
 $conn->query($sql); 
 header("Location: FournisseurClient.php ");
 exit();  

?>
