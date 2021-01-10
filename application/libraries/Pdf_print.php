<?php
require_once dirname(__file__)."/TCPDF/tcpdf.php";
/**
* 
*/
class Pdf_print extends TCPDF
{
	
	public function __construct()
	{
		parent:: __construct();
	}
}
?>