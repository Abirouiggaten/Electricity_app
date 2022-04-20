<?php
$e = $_POST["id"];
$bouton=$_POST["submit"];
// echo $e ;

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
 if($bouton=='Vu'){
    $sql = "UPDATE reclamation SET reponse='Votre reclamation sera traitée prochainement' WHERE IdReclamation='$e'" ;
    $result = $conn->query($sql);
    header("Location: FournisseurReclam.php ");
    exit();

}else{
    
?>
<!DOCTYPE html>
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
<body>
    <form method='POST' action='EnregistrerReclam.php' >
        <input type="hidden" name="id" value="<?php echo $e ?>" ><br>

        <textarea   rows="10"  name="Reponse" value="" class="form-control"></textarea><br><br>
        <!-- <input type="text" name="Reponse" value="" ><br><br> -->
        <center><input type="submit"  value="Envoyer" class="btn btn-outline-primary"></center>

    </form>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
    <footer>
        <div class="wraper1">
            <h1><b>Electri</b>   <span class="blue">APP</span></h1>
            <div class="copyright">Copyright ©2022 | Tous droits réservés.</div>
        </div>
    </footer>
</body>
</html>
<?php
}
?>