<?php

session_start();
$id = $_SESSION['identifiant'] ;
$date = $_POST['Date'] ;
$conso = $_POST['consom'] ;//nouvelle consom
$statut = 'non-paye' ;
$valider = 'validé';
$nonvalider = 'non validé';
$consomensuelle = 0 ;
$datecheance = date("Y-m-d", strtotime("+1 month", strtotime($date))); //generer date echeance

function montantht( $cons ){
  if($cons<=100){
    $z = $cons*0.91 ;
  }
  elseif($cons>100 && $cons<=200 ){
    $z = $cons*1.01 ;
  }
  elseif($cons>200){
    $z = $cons*1.12 ;
  }
  return $z;
}

function tva ( $consomationdh ){
  $x = $consomationdh*0.14  ;
  return $x ;
}



// get the id from the db
$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // $sql2 = " SELECT MAX(Consom) FROM consommationmensuelle WHERE IdClient =  '".$id."' ";
  // $result2 = $conn->query($sql2);
  // while($row = $result2->fetch_assoc()) {
  //   foreach( $row as $e ){
  //     $consomensuelle = $e ; //9dima
  //   }
  // }
  // $consomensuelle = $conso-$consomensuelle ;//un seul mois

$query="SELECT comparaison From consommationannuelle where IdClient =  '$id' ";
$resu = $conn->query($query);
while($row = $resu->fetch_assoc()) {
  foreach( $row as $e ){
    $comparaison = $e ; //9dima
  }
}
  if( date("m", strtotime($date)) == '01' && $comparaison == 'rectifier' ){
    $sq = " SELECT Consommation from consommationannuelle where IdClient =  '$id' and Annee = (YEAR(curdate())-1) " ;
    $res = $conn->query($sq);
  while($row = $res->fetch_assoc()) {
    foreach( $row as $e ){
      $consomensuelle = $e ; //9dima
    }
  }
  $consomensuelle = $conso-$consomensuelle ;
  }else {
    $sql2 = " SELECT MAX(Consom) FROM consommationmensuelle WHERE IdClient =  '".$id."' ";
    $result2 = $conn->query($sql2);
    while($row = $result2->fetch_assoc()) {
      foreach( $row as $e ){
        $consomensuelle = $e ; //9dima
      }
    }
    $consomensuelle = $conso-$consomensuelle ; 
  }

//insert consommationmensuelle ----------------
if($consomensuelle>=50 and $consomensuelle<=400 ){
$sql = " INSERT into consommationmensuelle ( IdClient , DateSaisie , Consom , statut ) VALUES ( '$id' , '$date' , '$conso ' ,'$valider ' ) ";
}
else{
  $sql = " INSERT into consommationmensuelle ( IdClient , DateSaisie , Consom , statut ) VALUES ( '$id' , '$date' , '$conso ' ,'$nonvalider ' ) ";
}
$result = $conn->query($sql);

//----------------------------------


if($consomensuelle>=50 and $consomensuelle<=400 ){
  $mtht = montantht( $consomensuelle );
  $tva = tva( $mtht ) ;
  $ttc = $mtht+$tva ;
  $sql3 = " INSERT into facture ( IdClient , DateEcheance , DateEmission ,  Consom , MontantHT ,TVA ,  MontantTTC , Status  ) VALUES ( '$id' , '$datecheance' , '$date' , '$consomensuelle' , '$mtht' , '$tva' , '$ttc' , '$statut' ) ";
  $result3 = $conn->query($sql3);
  // echo $result3 ; 
}

$conn->close();

header("Location: ClientConsom.html ");
exit();
 ?>


