<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seance";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$ecrire = fopen('seanceselectionner.txt', "w");

$sql =" select * from article";
$exec=mysqli_query($conn,$sql);
$data="";
while ($row=mysqli_fetch_array($exec))
{
    $data =$row ['nomS']. ';' . $row ['descriptionS']. ';' . $row ['dateS'].';' ;
    fputs($ecrire, $data);
    fputs($ecrire, "\n");
}
fclose($ecrire);

require('pdf/fpdf.php');

class PDF extends FPDF
{
    // Chargement des données
    function LoadData($file)
    {
        // Lecture des lignes du fichier
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }


    function FancyTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // En-tête
        $w = array(65, 65, 65);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Titres des colonnes
$header = array('NOM', 'Description', 'Date');
// Chargement des données
$data = $pdf->LoadData('seanceselectionner.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>