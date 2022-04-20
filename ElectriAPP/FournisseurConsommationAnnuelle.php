<?php

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql = "SELECT DISTINCT IdClient FROM consommationannuelle where comparaison is NULL " ;
// $sql1 = "SELECT * FROM consommationannuelle WHERE Annee=YEAR(CURDATE()) " ;
// $sql2 = "SELECT Consom FROM consommationmensuelle WHERE MONTH(DateSaisie)=12 and YEAR(DateSaisie)=YEAR(CURDATE()) ";
// $sql3 = "SELECT Consom FROM consommationmensuelle WHERE MONTH(DateSaisie)=12 and YEAR(DateSaisie)=(YEAR(curdate())-1) ";
  $result = $conn->query($sql);       
//   $result1 = $conn->query($sql1);
//   $result2 = $conn->query($sql2);
//   $result3 = $conn->query($sql3);

//   while($row = $result2->fetch_assoc()) {
//     foreach( $row as $e ){
//       $consomensuelle = $e ; //9dima
//     }
//   }

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <link href="https://fr.allfont.net/allfont.css?fonts=crete-round" rel="stylesheet" type="text/css" />   
        <title>Electri APP</title>
</head>
<body>
    <header>
        <div class="wraper1"> 
            <h1><b>Electri</b>   <span class="blue">APP</span> </h1> 
            <nav>
                <ul>
                <li> <a href="Dashboard.php">Dashboard</a></li>
                    <li> <a href="FournisseurClient.php">Client</a></li>
                    <li> <a href="FournisseurFacture.php">Factures</a></li>
                    <li> <a href="FournisseurConsommation.php">Consommation</a></li>
                    <li> <a href="FournisseurConsommationAnnuelle.php">Consom annuelle</a></li>
                    <li> <a href="FournisseurReclam.php">Réclamation</a></li>
                    <li> <a href="logout.php" class="connexion">Log out</a></li>
                </ul>
            </nav>  
        </div> 
    </header>
    <h3 class="EspaceFournisseur"> <b>Espace fournisseur</b> </h3> <br><br><br><br>
    <center>
 <table class="altrowstable" id="alternatecolor">
   <thead>
     <tr>
       <th>Id client</th>
       <th>Comsommation reélle</th>
       <th>Consommation Client</th>
       
     </tr>
   </thead>
   <tbody>
    
     <?php while($row = $result->fetch_assoc()) : ?>
     <tr>
       <td><?php $id = $row['IdClient'] ; echo htmlspecialchars($row['IdClient']); ?></td>
       <td><?php $sql1 = "SELECT * FROM consommationannuelle WHERE Annee=YEAR(CURDATE()) and IdClient='$id' " ;
 
       $result1 = $conn->query($sql1); 
       while($row1 = $result1->fetch_assoc()) : 
       echo htmlspecialchars($row1['Consommation']);
       endwhile; ?></td>
       <td><?php $sql2 = "SELECT Consom FROM consommationmensuelle WHERE MONTH(DateSaisie)=12 and YEAR(DateSaisie)=YEAR(CURDATE()) and IdClient='$id' ";
 
       $result2 = $conn->query($sql2);
       $sql3 = "SELECT Consom FROM consommationmensuelle WHERE MONTH(DateSaisie)=12 and YEAR(DateSaisie)=(YEAR(curdate())-1) and IdClient='$id' ";
       $result3 = $conn->query($sql3);
       $row2 = $result2->fetch_assoc() ;
       $row3 = $result3->fetch_assoc() ;
       $conso = intval($row2['Consom'])-intval($row3['Consom']) ;
       echo htmlspecialchars($conso);
        ?></td>

<td><form method="POST" action="traiterConsomAnnuelle.php" >
            <input type="hidden" name="id" value="<?php echo $row['IdClient'] ?>"  >
           <input type="submit" name="submit" value="Valider" class="btn btn-outline-success">
           <input type="submit"  name="submit" value="Rectifier" class="btn btn-outline-primary" >
         </form></td>

     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 </center>
 <br><br><br><br>
            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br><br>

 <footer>
        <div class="wraper1">
            <h1><b>Electri</b>   <span class="blue">APP</span></h1>
            <div class="copyright">Copyright ©2022 | Tous droits réservés.</div>
        </div>
    </footer>

</body>
</html>