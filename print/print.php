<?php
require_once('tcpdf/tcpdf.php');
include("../includes/db.php");
$invoice = $_GET['print'];
$sql1 = "select * from sales where invoice = '$invoice'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);
$name = $row1["customer_name"];
$mobile = $row1["customer_contact"];
$city = $row1["customer_city"];
$address = $row1["customer_address"];
$date = $row1["order_date"];

$sql2 = "select * from amount where invoice='$invoice'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($result2);
$total = $row2["total"];
$paid = $row2["paid"];
$due = $row2["due"];


function fetch_data()
{
     $invoice = $_GET['print'];
     $output = '';
     $con = mysqli_connect("sql307.byethost18.com","b18_27163534","01571707773r","b18_27163534_pos");
     $sql = "select * from sales where invoice='$invoice'";
     $result = mysqli_query($con, $sql);
     $i = 1;
     while ($row = mysqli_fetch_array($result)) {

          $cat_id = $row['product_category'];
          $cat = "select * from categories where cat_id=$cat_id";
          $cat_result = mysqli_query($con, $cat);
          $cat_row = mysqli_fetch_array($cat_result);
          $category = $cat_row['cat_title'];

          $pro_id = $row['product_id'];
          $pro = "select * from products where product_id=$pro_id";
          $pro_result = mysqli_query($con, $pro);
          $pro_row = mysqli_fetch_array($pro_result);
          $product = $pro_row['product_name'];

          $output .= '<tr>  
                          <td style="text-align:center;">' . $i . '</td>  
                          <td style="text-align:center;">' . $category . "  ( " . $product . " - " . $row["product_serial"] . " )" . '</td> 
                          <td style="text-align:center;">' . $row["product_qty"] . '</td>  
                          <td style="text-align:center;">' . $row["sub_total"] . " Tk" . '</td>    
                    </tr>  
                          ';
          $i = $i + 1;
     }
     return $output;
}
/*if (isset($_POST["print"])) {*/

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
     //Page header
     public function Header()
     {
          // get the current page break margin
          $bMargin = $this->getBreakMargin();
          // get current auto-page-break mode
          $auto_page_break = $this->AutoPageBreak;
          // disable auto-page-break
          $this->SetAutoPageBreak(false, 0);
          // set bacground image
          $img_file = 'memo.jpg';
          $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
          // restore auto-page-break status
          $this->SetAutoPageBreak($auto_page_break, $bMargin);
          // set the starting point for the page content
          $this->setPageMark();
     }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Cash memo');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$left_margin = 20;
$top_margin = 90;
$pdf->SetMargins($left_margin, $top_margin, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$bottom_margin = 52;
$pdf->SetAutoPageBreak(TRUE, $bottom_margin);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

// Print a text
$content = '';
$content = ' 
      <table cellpadding="2" cellspacing="2">  
      <tr>  
           <th style="text-align:left;" width="70%">Invoice No:' . " " . $invoice . '</th>  
           <th style="text-align:left;" width="30%">Date: ' . " " . $date . '</th>           
      </tr> 
      </table>

      <table cellpadding="2" cellspacing="2">  
      <tr>  
           <th style="text-align:left;" width="40%">Name:' . " " . $name . '</th>  
           <th style="text-align:left;" width="35%">Mobile:' . " " . $mobile . '</th> 
           <th style="text-align:left;" width="25%">City:' . " " . $city . '</th>           
      </tr> 

      <tr>  
           <th style="text-align:left;" width="100%">Address:' . " " . $address . '</th>         
      </tr>

      </table>

      <table cellpadding="2" cellspacing="2">  
      <tr>  
           <th> </th>  
           <th> </th>           
      </tr> 
      </table>

      <table cellspacing="0" cellpadding="2" border="1">  
           <tr>  
                <th style="text-align:center;" width="5%">Sl.</th>  
                <th style="text-align:center;" width="60%">Details</th>
                <th style="text-align:center;" width="15%">Quantity</th>                    
                <th style="text-align:center;" width="20%">Price</th>
                <th style="text-align:center;" width="20%" rowspan="2">Total</th>                
           </tr>  
      ';
$content .= fetch_data();

$content .= '</table>';

$content .= '<table cellpadding="2" cellspacing="2" border="1"> 
     <tr>  
          <th style="text-align:left;" width="34%">Total:' . " " . $total . '</th>  
          <th style="text-align:left;" width="33%">Paid: ' . " " . $paid . '</th> 
          <th style="text-align:left;" width="33%">Due: ' . " " . $due . '</th>        
     </tr> 
     </table> ';

$pdf->writeHTML($content, true, false, true, false, '');
$pdf->Output('memo.pdf', 'I');
