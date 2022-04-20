<?php
$id=$_POST["id"];
$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql = "UPDATE facture SET Status='paye' WHERE IdFacture='$id'" ;

$result = $conn->query($sql);

header("Location: FournisseurFacture.php ");
exit();

?>
