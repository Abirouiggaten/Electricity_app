<?php 
$e = $_POST['submit'];
$conso = $_POST['Consom'] ;//nouvelle consom
$id = $_POST['id'];


$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if($e=="Valider"){
    $sql2 = " UPDATE consommationannuelle SET comparaison='valider' where IdClient='$id' ";
    $result2 = $conn->query($sql2);
    
}elseif($e=="Rectifier"){
    $sql = "UPDATE consommationannuelle SET comparaison='rectifier' where IdClient='$id'" ;
$result = $conn->query($sql);
}




header("Location: FournisseurConsommationAnnuelle.php ");
 exit();

?>