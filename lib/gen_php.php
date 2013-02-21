<?php
require('tfpdf.php');
class tPDF extends tFPDF
{
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
include('../settings.php');

$pdf = new tFPDF();
$pdf->AddPage();

$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->SetLineWidth(.3);
//$pdf->SetFont('','B');
$w = array(40, 40);
$pdf->Cell(95,7,"Englisch",1,0,'C',false);
$pdf->Cell(95,7,"Französisch",1,0,'C',false);
$pdf->Ln();

$result_voclists = mysql_query("select lang1,ext1,lang2,ext2 from voclists_content where listid='".$_GET['listid']."'") or die(mysql_error());
  while ($row = mysql_fetch_array($result_voclists)){
    $pdf->Cell(95,10,$row['lang1'],1,0,'L',false);
    $pdf->Cell(95,10,$row['lang2'],1,0,'L',false);
    $pdf->Ln();
  }
$pdf->Cell(190,0,'','T');


$pdf->Output();
?>
