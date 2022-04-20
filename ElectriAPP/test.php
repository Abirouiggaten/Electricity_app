<?php
$e = $_POST["id"];
// echo $e ;

$conn = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql = "SELECT * FROM client where IdClient = '". $e ."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
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
    <section id="ajouterclient">
        <div class="wrapperconso2">
        <h4 ><b> Modifier client</b></h4> 
        <form method="POST" action="EnregistrerClient.php">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Identifiant</span>
                    <input disabled type="text" class="form-control" placeholder="Identifiant" aria-label="Identifiant" aria-describedby="basic-addon1" name="id" value="<?php echo $row['IdClient'] ?>">
                    <input type="hidden" name="id" value="<?php echo $row['IdClient'] ?>" ><br>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Nom et prénom</span>
                    <input type="text" aria-label="First name" class="form-control" name="prenom" value="<?php echo $row['Prenom'] ?>">
                    <input type="text" aria-label="Last name" class="form-control" name="nom" value="<?php echo $row['Nom'] ?>">
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                    <input  type="text" class="form-control" placeholder="saisir le mot de passe" aria-label="pswd" aria-describedby="basic-addon1" name="pswd" value="<?php echo $row['Pswd'] ?>">
                </div>
                
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="@example.com" aria-label="Email" aria-describedby="emailHelp" name="adrs" value="<?php echo $row['Mail'] ?>">
                    <!-- <input type="email" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2"> -->
                    <span class="input-group-text" id="basic-addon2">Email</span>
                </div>
                
                <div class="input-group mb-3">
                    <input type="tel" class="form-control" placeholder="+212" aria-label="numéro" name="tel" value="<?php echo $row['Tel'] ?>">
                    <span class="input-group-text">Télephone</span>
                </div>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="saisir la date de contract" aria-label="numcontract" name="numcontract" value="<?php echo $row['DateDebutCtr'] ?>">
                    <span class="input-group-text">Date de contract</span>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="saisir la région" aria-label="zone" name="zone" value="<?php echo $row['IdZone'] ?>">
                    <span class="input-group-text">Zone géographique</span>
                </div>
                <input type="hidden" name="modifier" value="modifier">
                
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" value="Enregistrer" >Enregistrer</button>
                </div>
                <div class="clear"></div> 
            </form>    
            </div>
        </section>
            <footer>
        <div class="wraper1">
            <h1><b>Electri</b>   <span class="blue">APP</span></h1>
            <div class="copyright">Copyright ©2022 | Tous droits réservés.</div>
        </div>
    </footer>
</body>
</html>