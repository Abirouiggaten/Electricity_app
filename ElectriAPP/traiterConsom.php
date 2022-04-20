<?php
$e = $_POST['submit'];
$conso = $_POST['Consom'] ;
$id = $_POST['id'] ;
$date = $_POST['Date'] ;
$datecheance = date("Y-m-d", strtotime("+1 month", strtotime($date))); //generer date echeance
$statut ='non-paye';

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


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
  
  

if($e == "Valider" ){
    
    $sql2 = " SELECT MAX(Consom) FROM consommationmensuelle WHERE IdClient =  '".$id."' and statut='validé' ";
    $result2 = $conn->query($sql2);
    while($row = $result2->fetch_assoc()) {
        foreach( $row as $e ){
            $consomensuelle = $e ; 
        }
    }
    $consomensuelle = $conso-$consomensuelle ;
    $mtht = montantht( $consomensuelle );
    $tva = tva( $mtht ) ;
    $ttc = $mtht+$tva ;
    $sql3 = " INSERT into facture (IdClient , DateEcheance , DateEmission , Consom , MontantHT , TVA , MontantTTC , Status ) VALUES ( '$id' , '$datecheance' , '$date' , '$consomensuelle' , '$mtht' , '$tva' , '$ttc' , '$statut'  ) ";
    $result3 = $conn->query($sql3);
    $sql4 = "UPDATE consommationmensuelle SET statut='validé' WHERE (IdClient='$id' and Consom='$conso')  " ; 
    $result4 = $conn->query($sql4);

    // if ($conn->query($sql3) === TRUE) {
    //     echo "ooookkkk" ;
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
}elseif($e == "Refuser"){
    $sql = " DELETE FROM consommationmensuelle where (IdClient='$id' and Consom='$conso') " ; 
    $result = $conn->query($sql);
}

header("Location: FournisseurConsommation.php");
exit();

?>