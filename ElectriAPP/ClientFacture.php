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
<?php 
session_start();
$id = $_SESSION['identifiant'] ;
    $conn = mysqli_connect("localhost","root", "","db_tp2");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM facture  WHERE IdClient='$id '" ;
      $result = $conn->query($sql);
?>
    <header>
        <div class="wraper1"> 
            <h1><b>Electri</b>   <span class="blue">APP</span> </h1> 
            <nav>
                <ul>
                <li> <a href="ClientFacture.php">Factures</a></li>
                    <li> <a href="ClientConsom.html">Consommation</a></li>
                    <li> <a href="ClientReclam.html">Réclamations</a></li>
                    <li> <a href="ClientReponseReclam.php">Réponse réclamation</a></li>
                    <li> <a href="logout.php" class="connexion">Log out</a></li>
                </ul>
            </nav>  
        </div> 
    </header>
    <h3 class="Espaceclient"> <b>Espace client</b> </h3>
    
    <!-- <section id='pdf' >
        <form action="pdf.php" method="post" >
            <button class="pdf" name="boutonpdf">Facture pdf</button>
        </form>
    </section> -->
<br><br><br><br><br>
<center>
    <table class="altrowstable" id="alternatecolor">
   <thead>
     <tr>
       <th>Date echeance</th>
       <th>Date emission</th>
       
     </tr>
   </thead>
   <tbody>
     <?php while($row = $result->fetch_assoc()) : ?>
     <tr>
     <?php $id = $row['IdClient']; ?>
       <td><?php echo htmlspecialchars($row['DateEcheance']); ?></td>
       <td><?php echo htmlspecialchars($row['DateEmission']); ?></td>
       
       
       <td><form method="POST" action="pdf.php" >
           <input type="hidden" name="id" value="<?php echo $row['IdFacture'] ?>"  >
           <input type="submit" name="submit" value="Facture pdf" class="btn btn-warning" >
         </form></td>
       
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 </center>

<br><br><br><br><br><br>
    <section id="localisation">
        <div class="wraper3">
            
            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=HMQ6+MWF,%20T%C3%A9touan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div></div> 
            <div id="info">
                 <h3 ><b>Nos informations</b></h3><br><br>
                 <p> <span style="color:rgb(0, 110, 255) ;"> <b> Email :</b></span>electri.app@etu.uae.ac.ma</p><br>
                 <p><span style="color:rgb(0, 110, 255) ;"><b> Numéro de téléphone :</b></span>05397-19906</p><br>
                 <p><span style="color:rgb(0, 110, 255) ;"> <b>Adresse :</b> </span> Avenue Mohamed 5 rue el alaouine, Tétouan</p>
                 <p class="media"><img src="media.png" ><span style="color:rgb(0, 110, 255) ;">  </span>Electri.APP</p>

            </div>
            <div class="clear"></div> 
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