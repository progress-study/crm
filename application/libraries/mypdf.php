<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter FPDF Class
 *
 * This class enables PDF reporting using FPDF
 *
 */

use fpdf\fpdf;
class PDF extends FPDF {
            function Header(){
                $this->Cell(12);
                $this->Image('assetpics/template.png',10,10,191);
                $this->Cell(12);
            }
        }
  
/* End of file Pdf.php */