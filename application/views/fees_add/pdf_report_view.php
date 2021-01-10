<?php
ob_start();
base_url('libraries/Pdf_print.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sir Noor');
$pdf->SetTitle('Fee Management System');
$pdf->SetSubject('Student fee record');
$pdf->SetKeywords('Student, PDF, Fee, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusansi', 'B', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
<br/>
<h1>Student Monthly Fee Record</h1>
EOD;

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $txt, 0, 1, 0, true, 'C',true);
$pdf->Ln(8);
$tab = '<table style="border:1px solid black">';
$tab .= '<tr>
	<th style="border:1px solid black">Student ID </th>
	<th style="border:1px solid black">Student Name </th>
	<th style="border:1px solid black">Class</th>
	<th style="border:1px solid black">Group</th>
	
	</tr>';
	if ($std_result != null) {
		
foreach ($std_result as $rec) {
	$tab .= '<tr>
	<td>'.$rec->st_id.'</td>
	<td>'.$rec->st_name.'</td>
	<td>'.$rec->cls_name.'</td>
	<td>'.$rec->grp_name.'</td>
	
			</tr>';
	}
}
else {
	redirect("fees.htm");
}

$tab .= '</table>';
$pdf->writeHTMLCell(0, 0, '', '', $tab, 0, 1, 0, true, 'C',true);
$pdf->Ln(15);
$tab = '<table style="border:1px solid black">';
$tab .= '<tr>
	<th style="border:1px solid black">Admission Date</th>
	<th style="border:1px solid black">Paid Amount</th>
	<th style="border:1px solid black">Prev Month</th>
	<th style="border:1px solid black">Paid Date</th>
	</tr>';
	if ($std_result != null) {
		
foreach ($std_result as $rec) {
	$convertDate = date("d-M-Y", strtotime($rec->st_admission_date)); 
	if ($result1 != null) {
			
		
	
		
	$tab .= '<tr>
	<td>'.$convertDate.'</td>
	<td>'.$rec->fp_paid_amount.'</td>
	<td>'. $result1[0]->fp_month.'</td>
	<td>'.$rec->fp_month.'-'.$rec->fp_year.'</td>
			</tr>';
		
	}
	else{
		$nill = "---";
	$tab .= '<tr>
	<td>'.$convertDate.'</td>
	<td>'.$rec->fp_paid_amount.'</td>
	<td>'. $nill.'</td>
	<td>'.$rec->fp_month.'-'.$rec->fp_year.'</td>
			</tr>';
	}
 }
}
else {
	redirect("fees.htm");
}

$tab .= '</table>';
$pdf->writeHTMLCell(0, 0, '', '', $tab, 0, 1, 0, true, 'C',true);


$pdf->Ln(10);
$txt1 = <<<EOD
<div style="align:right;position:absolute;">
<p>Signature __________________</p>
</div >
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $txt1, 0, 4, 0,  2,true);

// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('student_fee_report.pdf', 'I');

//============================================================+
// END OF FILE
//====================
?>