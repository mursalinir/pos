<?php
require_once('tcpdf/tcpdf.php');

$con1 = mysqli_connect("localhost", "root", "", "neon");
$sql1 = "select * from cart";
$result1 = mysqli_query($con1, $sql1);
$row1 = mysqli_fetch_array($result1);
$name = $row1["customer_name"];
$mobile = $row1["customer_contact"];
$city = $row1["customer_city"];
$address = $row1["customer_address"];
$date = $row1["order_date"];
$invoice = $row1["cart_id"];
/*
$sql2 = "select * from amount_details";
$result2 = mysqli_query($con1, $sql2);
$row2 = mysqli_fetch_array($result2);
$total = $row2["total"];
$paid = $row2["paid"];
$due = $row2["due"];
$cost = $row2["cost"];
$discount = $row2["discount"];
*/

function fetch_data()
{
     $output = '';
     $con = mysqli_connect("localhost", "root", "", "neon");
     $sql = "select * from cart";
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
                          <td style="text-align:center;">' . $row["total_price"] . " Tk" . '</td>    
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
          $img_file = 'watermark.jpg';
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
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 16);

// add a page
$pdf->AddPage();

// Print a text
$content = '';
$content = ' 
     <img src="slides_images/memo.jpg" height="400" width="1000">

      <table cellpadding="2" cellspacing="2">  
      <tr>  
           <th style="text-align:left;" width="70%">Invoice No:' . " " . $invoice . '</th>  
           <th style="text-align:left;" width="30%">Date: ' . " " . $date . '</th>           
      </tr> 
      </table>

      <table cellpadding="2">  
      <tr>  
           <th style="text-align:left;" width="40%">Name:' . " " . $name . '</th>  
           <th style="text-align:left;" width="35%">Mobile:' . " " . $mobile . '</th> 
           <th style="text-align:left;" width="25%">City:' . " " . $city . '</th>           
      </tr> 

      <tr>  
           <th style="text-align:left;" width="100%">Address:' . " " . $address . '</th>         
      </tr>

      </table>

      <table cellspacing="0" cellpadding="2" border="1">  
           <tr>  
                <th style="text-align:center;" width="5%">Sl.</th>  
                <th style="text-align:center;" width="60%">Details</th>
                <th style="text-align:center;" width="15%">Quantity</th>                    
                <th style="text-align:center;" width="20%">Price</th>                
           </tr>  
      ';
$content .= fetch_data();
$content .= '</table>';
$content .= '<table cellpadding="2" cellspacing="2" border="1"> 
     <tr>  
          <th style="text-align:left;" width="34%">Total:' . " " . $total . '</th>  
          <th style="text-align:left;" width="33%">Due: ' . " " . $due . '</th>     
          <th style="text-align:left;" width="33%">Paid: ' . " " . $paid . '</th>          
     </tr> 
     </table> ';

//$content .= '<img src="watermark.png" height="700" width="1000"> ';

$pdf->writeHTML($content, true, false, true, false, '');
//ob_end_clean();
$pdf->Output('memo.pdf', 'I');
