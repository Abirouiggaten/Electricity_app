<?php

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql = "SELECT * FROM consommationmensuelle  WHERE statut='non validé '" ;
// $sql2 = " SELECT MAX(Consom) FROM consommationmensuelle WHERE IdClient =  '".$id."' ";
//   $result2 = $conn->query($sql2);
//   while($row = $result2->fetch_assoc()) {
//     foreach( $row as $e ){
//       $consomensuelle = $e ; //9dima
//     }
//   }

$result = $conn->query($sql);
  // $result = $conn->query($sql);

  if( isset($_POST['recherche']) ){
    $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
    
    $sq = "SELECT * FROM consommationmensuelle where statut='non validé' and ( IdClient LIKE '%$recherche%' OR DateSaisie LIKE '%$recherche%'  ) " ;
    }else{
      $sq = "SELECT * FROM consommationmensuelle where statut='non validé' "  ;
    }
    $result = $conn->query($sq);

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
    <h3 class="EspaceFournisseur"> <b>Espace fournisseur</b> </h3>
    <div class="rechercher"><form method="POST" action=""><br> 
     Rechercher  <input type="text" name="recherche">
     <input type="SUBMIT" value="Recherche" class="btn btn-secondary" > 
     </form><br><br></div>
     <center>
 <table class="altrowstable" id="alternatecolor">
   <thead>
     <tr>
       <th>Id</th>
       <th>Date Saisie</th>
       <th>Comsommation</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $result->fetch_assoc()) : ?>
     <tr>
     <?php $id = $row['IdClient']; ?>
       <td><?php echo htmlspecialchars($row['IdClient']); ?></td>
       <td><?php echo htmlspecialchars($row['DateSaisie']); ?></td>
       <td><?php echo htmlspecialchars($row['Consom']); ?></td>
       
       <td><form method="POST" action="traiterConsom.php" >
           <input type="hidden" name="id" value="<?php echo $row['IdClient'] ?>"  >
           <input type="hidden" name="Consom" value="<?php echo $row['Consom'] ?>"  >
           <input type="hidden" name="Date" value="<?php echo $row['DateSaisie'] ?>"  >
           <input type="submit" name="submit" value="Valider" class="btn btn-outline-success" >
           <input type="submit"  name="submit" value="Refuser" class="btn btn-outline-danger">
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
 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 

 <footer>
        <div class="wraper1">
            <h1><b>Electri</b>   <span class="blue">APP</span></h1>
            <div class="copyright">Copyright ©2022 | Tous droits réservés.</div>
        </div>
    </footer>

</body>
</html>