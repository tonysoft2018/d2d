<?php

   /*<Includes>*/
   include_once('../../ModulePugins/door2door.Cofiguration.Conection.php');
   /*<Includes>*/
   /*<use>*/
       use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection as ConectionCommission;
   /*<use>*/
require '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Reportes extends ConectionCommission{

    public function __construct(){
        // Cosntruct Father
        parent::__construct();
    }

    public function toHtml($entra){
        $traduce=array( 'á' => '&aacute;' , 'é' => '&eacute;' , 'í' => '&iacute;' , 'ó' => '&oacute;' , 'ú' => '%uacute;' , 'ñ' => '&ntilde');
        $sale=strtr( $entra , $traduce );
        return $sale;
    }

    public function CreacionPDF(
                                    $FechaInicio,
                                    $FechaFinal
                                ){
                                    


        /*<Consulta empresas>*/
            /*<Variables de Empresas>*/
                $EMPRESAS_RAZONSOCIAL   = '';
                $EMPRESAS_RFC           = '';
                $EMPRESAS_DOMICILIO     = '';
                $EMPRESAS_NOEXTERIOR    = '';
                $EMPRESAS_NOINTERIOR    = '';
                $EMPRESAS_COLONIA       = '';
                $EMPRESAS_CIUDAD        = '';
                $EMPRESAS_ESTADO        = '';
                $EMPRESAS_PAIS          = '';
                $EMPRESAS_CODIGOPOSTAL  = '';
                $EMPRESAS_TELEFONO      = '';
                $EMPRESAS_CELULAR       = '';
                $EMPRESAS_EMAIL         = '';
                $EMPRESAS_IMAGEN        = '';
            /*<Variables de Empresas>*/

            /*<Consulta  de Empresas>*/
                $QueryEempresas = 'SELECT * FROM empresa WHERE bstate = 1';
                $this->open();       
                    if ($Empresas = mysqli_query($this->Connection, $QueryEempresas)) {                  
                        if( $Empresas->num_rows > 0 ) {
                            while($Em = $Empresas->fetch_array(MYSQLI_ASSOC))
                            {
                                $EMPRESAS_RAZONSOCIAL   = $Em['razonSocial'] ;
                                $EMPRESAS_RFC           = $Em['rfc'] ;
                                $EMPRESAS_DOMICILIO     = $Em['domicilio'] ;
                                $EMPRESAS_NOEXTERIOR    = $Em['noExterior'] ;
                                $EMPRESAS_NOINTERIOR    = $Em['noInterior'] ;
                                $EMPRESAS_COLONIA       = $Em['colonia'] ;
                                $EMPRESAS_CIUDAD        = $Em['ciudad'] ;
                                $EMPRESAS_ESTADO        = $Em['estado'] ;
                                $EMPRESAS_PAIS          = $Em['pais'] ;
                                $EMPRESAS_CODIGOPOSTAL  = $Em['codigoPostal'] ;
                                $EMPRESAS_TELEFONO      = $Em['telefono'] ;
                                $EMPRESAS_CELULAR       = $Em['celular'] ;
                                $EMPRESAS_EMAIL         = $Em['email'] ;
                                $EMPRESAS_IMAGEN        = $Em['imagen'] ;                             
                            }
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                $this->closet();
            /*</Consulta  de Empresas>*/

        /*</Consulta empresas>*/




        /*<Query Compras>*/
            $QueryCompras = '';
        /*</Query Compras>*/


        
        
            
       /*<Imprimir>*/        
       require('../../ModulePugins/fpdf/fpdf.php');
       /*<Head>*/     
           $pdf=new FPDF('L','mm','A4');
           $pdf->AddPage();

           $y_axis_initial = 25;

           /*<Datos de la empresa>*/
               $URL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
               //$pdf->Image($URL.$EMPRESAS_IMAGEN, 120, 10, 70, 0, 'png');
               /*< -- --->*/
               $pdf->SetFont('Arial','',14);  
               $pdf->Cell(40,20,utf8_decode($EMPRESAS_RFC));
               $pdf->Ln(5);
               /*< -- --->*/
               $pdf->SetFont('Arial','',14);  
               $pdf->Cell(40,20,utf8_decode($EMPRESAS_DOMICILIO.'No. '.$EMPRESAS_NOEXTERIOR.' '.$EMPRESAS_NOINTERIOR));
               $pdf->Ln(5);
               /*< -- --->*/
               $pdf->SetFont('Arial','',14);  
               $pdf->Cell(40,20,utf8_decode($EMPRESAS_PAIS.' '.$EMPRESAS_ESTADO.' '.$EMPRESAS_PAIS.' Col. '.$EMPRESAS_COLONIA));
               $pdf->Ln(5);
               /*< -- --->*/
               $pdf->SetFont('Arial','',14);  
               $pdf->Cell(40,20,utf8_decode('Tel '.$EMPRESAS_TELEFONO.' Cel. '.$EMPRESAS_CELULAR));
               $pdf->Ln(20);
           /*</Datos de la empresa>*/

       
       
                           
                       
           $width_cell=array(40,40,40,40,40);
           $pdf->SetFillColor(193,229,252); // Background color of header 
           $pdf->SetFont('Arial','',10);
           // Header starts /// 
               $pdf->Cell($width_cell[0],10,utf8_decode('Folio')             ,1,0,'L',true); // First header column 
               $pdf->Cell($width_cell[1],10,utf8_decode('Fecha')         ,1,0,'L',true); // Second header column
               $pdf->Cell($width_cell[2],10,utf8_decode('Nombre')         ,1,0,'L',true); // Second header column
               $pdf->Cell($width_cell[3],10,utf8_decode('Tipo')            ,1,0,'L',true); // Third header column 
               $pdf->Cell($width_cell[4],10,utf8_decode('Estatus')          ,1,0,'L',true); // Fourth header column
               $pdf->Cell($width_cell[5],10,utf8_decode('Usuario')            ,1,0,'L',true); // Fourth header column
              
               $pdf->Ln(10);
               $pdf->SetFillColor(248, 248, 255);

       /*</Head>*/   
       $Query = '    SELECT 
                            cam.folio,
                            cam.fecha,
                            cam.nombre,
                            cam.tipoCampana,
                            cam.estatus,
                            (
                                SELECT usu.nombres FROM usuarios usu WHERE cam.idUsuario = usu.idUsuario
                            )AS Usuario
                            FROM campana  cam   
                        WHERE 
                            cam.fecha >= "'.$FechaInicio .' 00:00:00" AND  
                            cam.fecha <= "'.$FechaFinal.' 00:00:00"   AND    
                            cam.bstate = 1  ';


       $this->open();
           $Data = [];
           if ($result = mysqli_query($this->Connection, $Query)) { 

           
                while($r = $result->fetch_array(MYSQLI_ASSOC)){
                    /*<Celdas>*/    
                    $pdf->SetFillColor(255, 255, 255);
                    $pdf->Cell($width_cell[0],10,$r['folio']                    ,1,0,'C',true); // First header column 
                    $pdf->Cell($width_cell[1],10,utf8_decode($r['fecha'])       ,1,0,'L',true); // Second header column
                    $pdf->Cell($width_cell[2],10,utf8_decode($r['nombre'])      ,1,0,'L',true); // Third header column 
                    $pdf->Cell($width_cell[3],10,utf8_decode($r['tipoCampana']) ,1,0,'L',true); // Fourth header column
                    $pdf->Cell($width_cell[4],10,utf8_decode($r['estatus'])     ,1,0,'L',true); // Fourth header column
                    $pdf->Cell($width_cell[5],10,utf8_decode($r['Usuario'])     ,1,0,'L',true); // Fourth header column                  
                    $pdf->Ln(10);

           
                
                    /*<Celdas>*/     
                }
               
           } else {
              echo "asd". $Query;
           }        
      
          
       $this->closet();
       $pdf->Output();
        /*</Imprimir>*/  
        
                                
                                
                                
    }

    public function CreacionExcel(
                                    $FechaInicio,
                                    $FechaFinal
                                ){
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");

        $spreadsheet = new Spreadsheet();

        $Query = '   SELECT 
                            cam.folio,
                            cam.fecha,
                            cam.nombre,
                            cam.tipoCampana,
                            cam.estatus,
                            (
                                SELECT usu.nombres FROM usuarios usu WHERE cam.idUsuario = usu.idUsuario
                            )AS Usuario
                            FROM campana  cam   
                        WHERE 
                            cam.fecha >= "'.$FechaInicio .' 00:00:00" AND  
                            cam.fecha <= "'.$FechaFinal.' 00:00:00"   AND    
                            cam.bstate = 1  ';

        $nombre = 'REPORTES_CAMPPANAS_'.$FechaInicio.'_'.$FechaFinal.'_'.date("Ymdhis");

        $this->open();
            $Data = [];
            if ($result = mysqli_query($this->Connection, $Query)) { 

                    $cantidad       = 0;
                    $precioUnitario = 0;
                    $descuento      = 0;
                    $comicion       = 0;
                    $mondedero      = 0;
                    $total          = 0;

                    $sheet = $spreadsheet->getActiveSheet();

                    $sheet->setCellValue('A1', 'Folio');
                    $sheet->setCellValue('B1', 'Fecha');
                    $sheet->setCellValue('C1', 'Nombre');
                    $sheet->setCellValue('D1', 'Tipo');
                    $sheet->setCellValue('E1', 'Estatus');
                    $sheet->setCellValue('F1', 'Usuario');
                    $i = 2;
                    while($r = $result->fetch_array(MYSQLI_ASSOC)){
                         
                        
                       

                        $sheet->setCellValue('A'.$i, $r['folio']);
                        $sheet->setCellValue('B'.$i, $r['fecha']);
                        $sheet->setCellValue('C'.$i, $r['nombre']);
                        $sheet->setCellValue('D'.$i, $r['tipoCampana']);
                        $sheet->setCellValue('E'.$i, $r['estatus']);
                        $sheet->setCellValue('F'.$i, $r['Usuario']);

                      
                    
                        $i++;
                        /*<Celdas>*/   
                    }  
                    $writer = new Xlsx($spreadsheet);
                    $writer->save($nombre.'.xlsx');

                    $SERVER  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
                    $URL = 'Location: '.$SERVER.'/d2dSocioWeb/Modules/ModuleReportes/api/'.$nombre.'.xlsx';
                    header($URL);
            } else {
                echo "asd ". $Query;
            }        
            
        $this->closet();
        
    }

    
   

    // MEtodos Extra 

    
    
}
    