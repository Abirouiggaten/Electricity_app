<?php

$id = $_POST["identifiant"] ;
$pass = $_POST["password"] ;
$type =$_POST["type"] ;

session_start();
$_SESSION["identifiant"]= strval($id);
$_SESSION["password"]=$pass;


$conn = mysqli_connect("localhost","root", "","db_tp2");
// echo "1" ;
if (!$conn) {
    // echo "1" ;
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM " . $type ." where Id".$type ."  = '".strval( $id )."'" ;// `client` WHERE IdClient = 
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // echo "1" ;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "2" ;
      if ($row["Pswd"] != $pass ){
        //  echo "2" ;
        header("Location: index.html ");
        exit();
      }else{
        if($type == "client" ) {
            header("Location: ClientConsom.html ");
            exit();
          }elseif($type == "agent"){
            header("Location: Agent.html ");
            exit();
          }
          elseif($type == "fournisseur"){ 
            // header("Location: FournisseurAjouterClient.html") ;
            header("location: Dashboard.php ");
            exit();
          }
        
      } ;
    }
  }else{//user n'existe pas
    // echo $sql ;
    header("Location: index.html ");
    exit();
  }
  $conn->close();



?>