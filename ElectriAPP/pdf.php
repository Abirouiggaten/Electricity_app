<?php

session_start();
$id = $_SESSION['identifiant'] ;
$IdFacture=$_POST['id'];

$conn = mysqli_connect("localhost","root", "","db_tp2");
// echo "1" ;
if (!$conn) {
    // echo "2" ;
    die("Connection failed: " . mysqli_connect_error());
  }

require_once 'fpdf/fpdf.php';
// $sql = "select IdFacture, IdClient, DateEcheance, DateEmission, Consom, TVA, MontantHT, MontantTTC from facture;";
$sql = "SELECT * from facture WHERE IdFacture='$IdFacture' ";
$sql1="SELECT Nom, Prenom, IdZone from client WHERE IdClient='$id'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//mise en page du pdf
class PDF extends FPDF
{
    //entete
    function Header()
    {
    // Logo
    $this->Image('logo.png',20,6,30);
    $this->Ln(10);

    $this->Image('codebar.png',160,6,40);

    // Police Arial gras 15
    $this->SetFont('Arial','B',35);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Ln(20);
    $this->Cell(100,10,'Facture de ce mois',0,0,'C');
    // Saut de ligne
    $this->Ln(60);
    }
    function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Contactez nous +212-557800378     Site web ELECTRI       adresse rue el alaouiyine,Tetouan',0,0,'C');
}
}




if(isset($_POST['submit']))
{
    ob_start();
    
    $pdf = new PDF('p','mm','a4');
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',16);
    $pdf->AddPage();
//nom et prenom client
    while($row = $result1->fetch_assoc())
    {
        $pdf->cell('60','10','Nom Client : ','0','0');
        $pdf->cell('60','10',$row["Nom"],'0','1');
        $pdf->cell('60','10','Prenom Client : ','0','0');
        $pdf->cell('60','10',$row["Prenom"],'0','1');
    }

    //Id facture
    
    while($row = $result->fetch_assoc())
    {
        $pdf->cell('60','10','IdFacture : ','0','0',);
        $pdf->cell('60','10',$row["IdFacture"],'0','1',);
        $pdf->cell('60','10','IdClient : ','0','0');
        $pdf->cell('60','10',$row["IdClient"],'0','1');
        $pdf->cell('60','10','Date Echeance : ','0','0');
        $pdf->cell('60','10',$row["DateEcheance"],'0','1');
        $pdf->cell('60','10','Date Emission : ','0','0');
        $pdf->cell('60','10',$row["DateEmission"],'0','1');
        $pdf->cell('60','10','Consommation : ','0','0');
        $pdf->cell('60','10',$row["Consom"],'0','1');
        $pdf->cell('60','10','MontantHT : ','0','0');
        $pdf->cell('60','10',$row["MontantHT"],'0','1');
        $pdf->cell('60','10','TVA : ','0','0');
        $pdf->cell('60','10',$row["TVA"],'0','1');
        $pdf->cell('60','10','Montant TTC : ','0','0');
        $pdf->cell('60','10',$row["MontantTTC"],'0','1');
    }
   
    $pdf->Output();
    ob_end_flush();   

}
?>