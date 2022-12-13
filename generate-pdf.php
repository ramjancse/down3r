<?php 
    include('./backend/AllBioScriptFront.php');
    require('./FPDF/fpdf.php');

    $pdf = new FPDF();
    $bio = $data['bio'];

  


    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 19);

    $pdf->Cell(50,10, "Bio",1,0);
    $pdf->Cell(50,10, $bio,1,1);
    
    $pdf->Output();

?>