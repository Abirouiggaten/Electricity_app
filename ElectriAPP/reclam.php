<?php
    $objet=$_POST["objet"];
    $message=$_POST["message"];

    session_start();
    $id = $_SESSION["identifiant"];

    $conn = mysqli_connect("localhost","root", "","db_tp2");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = " INSERT into reclamation ( IdClient , Objet , Message ) VALUES ( '$id' , '$objet' , '$message' ) ";
  $conn->query($sql) ;
  $conn->close();
  header("Location: ClientReclam.html");
exit();
  ?>