<?php
$e = 0 ;
$f =intval(1);
$mois = array('0','Jan','Fev','Mar','Avr','Mai','jun','Jul','aug','Sep','Oct','Nov','Dec') ;
$zone = array('1','2','3','4','5') ;

$connect = mysqli_connect("localhost", "root", "", "db_tp2");


$chartData = array(
    array('mois', 'conso')
);
$chartData1 = array(
  array('zone', 'conso')
);


foreach($mois as $x)//while dyal les mois
{
    // echo $x ;
    $sql="SELECT SUM(Consom)  FROM facture where (SELECT MONTH(DateEmission))=$e  ";//$e chhar
    $result1 = mysqli_query($connect, $sql);
    $m = ($result1->fetch_assoc()) ;
    // print_r($m)  ;
    // echo "<br>" ;
    $chartData = array_merge($chartData, array(array($x,$m['SUM(Consom)'])));
    // $chart_data .= "{ DateEmission:'".$row["DateEmission"]."', Consom:".$row["Consom"]."}, ";
    $e+=1;
}

$chartDataInJson = json_encode($chartData);

// $sql1 = "SELECT SUM(MontantTTC) FROM facture WHERE Status='non-paye' ";
// $result = $connect->query($sql1);




foreach($zone as $y)//while dyal les mois
{
  $consoparzon = 0 ;

    $sql1="  SELECT IdClient from client where IdZone= $f   ";//$f zone
    // $result2 = $connect->query($sql1) ;SELECT SUM(Consom)  FROM facture where IdClient
    if ($connect->query($sql1) == TRUE) {
      $result2 = $connect->query($sql1) ;
      while($row = $result2->fetch_assoc()) {
        $client = $row['IdClient'];
        $sql3 = "SELECT SUM(Consom)  FROM facture where IdClient = $client " ;
        $result3 = $connect->query($sql3) ;
        $z = ($result3->fetch_assoc()) ;
        $consoparzon+=intval($z['SUM(Consom)']);
        // echo $consoparzon."<br>"  ;
        // $chartData1 = array_merge($chartData1, array(array($y,$z['SUM(Consom)'])));
        // print_r($row);
      } ;
      // echo "<br><br><br>" ;
      } //else {
      //   echo "Error: " . $sql1 . "<br>" . $connect->error;
      // }
    // while($row = $result2->fetch_assoc()) {
    //   foreach( $row as $e ){
    //     echo $e ; //9dima
    //   }
    // }
    // $z = ($result2->fetch_assoc()) ;
    $chartData1 = array_merge($chartData1, array(array($y,$consoparzon)));
    $f+=1;
    
}
$chartDataInJson1 = json_encode($chartData1);

$connect = mysqli_connect("localhost","root", "","db_tp2");
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$sql8 = "SELECT SUM(MontantTTC) FROM facture WHERE Status='non-paye' ";
$result8 = $connect->query($sql8);

?>













<html>
  <head>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <link href="https://fr.allfont.net/allfont.css?fonts=crete-round" rel="stylesheet" type="text/css" />   
        <title>Electri APP</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChartmois);
      google.charts.setOnLoadCallback(drawChartzone);

      function drawChartmois() {

        var data = google.visualization.arrayToDataTable(<?php echo $chartDataInJson; ?>);

        var options = {
          chart: {
            title: 'consommation ',
            subtitle: 'Kwh',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material_mois'));
        
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      // par zone

                function drawChartzone() {

          var data = google.visualization.arrayToDataTable(<?php echo $chartDataInJson1; ?>);

          var options = {
            chart: {
              title: 'consommation par zone ',
              subtitle: 'Kwh',
            }
          };

          var chart = new google.charts.Bar(document.getElementById('columnchart_material_zone'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
          }

    </script>
  </head>
  <body>
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
    <br><br>
    <center>
    <table class="columns">
      <tr>
        <td><div id="columnchart_material_mois" style="width: 600px; height: 300px;"></div></td>
        <td><div id="columnchart_material_zone" style="width: 600px; height: 300px;"></div></td>
      </tr>
    </table>
    <br>
        <!-- <div class="row">
  <div class="col-sm-6">
    <div class="card"> -->
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Montant des factures non payées</h5>
        <p class="card-text"><?php while($row = $result8->fetch_assoc()) :
        echo htmlspecialchars($row['SUM(MontantTTC)']);  ?></p><?php endwhile; ?>
        <a href="#" class="btn btn-primary">Dhs</a>
      </div>
    </div>
  </div>
        </section><br><br></center>
    <footer>
        <div class="wraper1">
            <h1><b>Electri</b>   <span class="blue">APP</span></h1>
            <div class="copyright">Copyright ©2022 | Tous droits réservés.</div>
        </div>
    </footer>
  </body>
</html>