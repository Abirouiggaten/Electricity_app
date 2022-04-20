<?php

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql = "SELECT * FROM client";
$result = $conn->query($sql);

if( isset($_POST['recherche']) ){
  $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
  
  $sql = "SELECT * FROM client WHERE IdClient LIKE '%$recherche%' OR Nom LIKE '%$recherche%' OR Prenom LIKE '%$recherche%' " ;
  }else{
    $sql = "SELECT * FROM client";
  }
  $result = $conn->query($sql);

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
    <h3 class="EspaceFournisseur"> <b>Espace fournisseur</b> </h3><br>
    <div class="rechercher"><form method="POST" action="" > 
     Rechercher un client  <input type="text" name="recherche">
     <input type="SUBMIT" value="Recherche" class="btn btn-secondary"> 
     </form></div><br><br>
     <center>
       <br><br><br>
 <table class="altrowstable" id="alternatecolor">
   <thead>
     <tr>
       <th>ID</th>
       <th>Mot de passe</th>
       <th>Nom</th>
       <th>Prenom</th>
       <th>Email</th>
       <th>Tel</th>
       <th>Date contract</th>
       <th>Zone</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $result->fetch_assoc()) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['IdClient']); ?></td>
       <td><?php echo htmlspecialchars($row['Pswd']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom']); ?></td>
       <td><?php echo htmlspecialchars($row['Prenom']); ?></td>
       <td><?php echo htmlspecialchars($row['Mail']); ?></td>
       <td><?php echo htmlspecialchars($row['Tel']); ?></td>
       <td><?php echo htmlspecialchars($row['DateDebutCtr']); ?></td>
       <td><?php echo htmlspecialchars($row['IdZone']); ?></td>
       <td><form method="POST" action="ModifierClient.php" ><input  type="hidden" name="id" value="<?php echo $row['IdClient'] ?>"  ><input type="submit" value="Modifier" class="btn btn-outline-success" > </form></td>
       
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table><br>
 <form action="FournisseurAjouterClient.html" method ="POST">
                <input type="submit" name="Ajouter" value="Ajouter" class="btn btn-outline-primary">
            </form>
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