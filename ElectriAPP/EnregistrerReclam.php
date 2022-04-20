 <?php
 $e = $_POST["id"];
$reponse=$_POST["Reponse"];

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
//   $sql = "UPDATE reclamation SET reponse ='$reponse' where IdReclamation= = '$e'   "; 
    $sql = "UPDATE reclamation SET reponse='$reponse' WHERE IdReclamation='$e'  ";

 $conn->query($sql); 
 header("Location: FournisseurReclam.php ");
 exit();  

?>
