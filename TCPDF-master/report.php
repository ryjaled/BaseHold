<?php

// Include the main TCPDF library (search for installation path).

require_once('tcpdf_include.php');
include("../events.php");
include("../users.php");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = '../images/NCA.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 10, 'Report', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

$startdate=$_REQUEST['start'];
$enddate=$_REQUEST['end'];
$reporter=$_REQUEST['reporter'];

$user = new users();
$event = new events();

$row=$user->getUser($reporter);
while ($row = $user->fetch()) {
    $name = $row['firstname'].' '.$row['lastname'];	
}

// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($name);
$pdf->SetTitle('Outreach Report By '.$name);
$pdf->SetSubject('Report Page');
$pdf->SetKeywords('Report, Page, Reports');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

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
$pdf->SetFont('dejavusans', '', 10);

// add a page
//$pdf->AddPage();
$pdf->AddPage('L', 'A4');

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h4>Outreach Report From <b>'.$startdate.'</b> to <b>'.$enddate.'</b></h4>';
$html .='<table border="1" cellpadding="4" width="100%">
    <tr>
        <th width="15%" align="center">Areas</th>
        <th width="15%" align="center">Events</th>
        <th width="15%" align="center">Members</th>
        <th width="15%" align="center">Complaints</th>
        <th width="20%" align="center">Observations</th>
        <th width="20%" align="center">Challenges</th>
    </tr>';

$converted_sdate = strtotime($startdate);
$converted_edate = strtotime($enddate);
$final_sdate = date("Y-m-d H:i:s", $converted_sdate);
$final_edate = date("Y-m-d H:i:s", $converted_edate);

$row=$event->getDashRegionFigures($final_sdate,$final_edate);
while ($row = $event->fetch()) {
    $html .= '<tr>
                <td>'.$row['regname'].'</td>';
                
    $html .= '<td bgcolor="#cccccc" align="center" colspan="2">A1 ex<i>amp</i>le <a href="http://www.tcpdf.org">link</a> column span. One two tree four five six seven eight nine ten.<br />line after br<br /><small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal  bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla<ol><li>first<ol><li>sublist</li><li>sublist</li></ol></li><li>second</li></ol><small color="#FF0000" bgcolor="#FFFF00">small small small small small small small small small small small small small small small small small small small small</small></td>';

    $html .= '<td>4B</td>
            </tr>';
}

$html.='</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+