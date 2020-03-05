<?php 
    class mi_pdf extends FPDF {
        function Header(){
            $encabezado1 = "Examen DAW 2019/2020";
            $encabezado2 = "Antonio Miguel Pavon Rodriguez";
            $this->SetFont('Courier', '', 10);
            $this->Cell(90,10,utf8_decode($encabezado1),'B',0,'L');
            $this->Cell(90,10,utf8_decode($encabezado2),'B',1,'R');
        }

        function Footer(){
            $this->SetY(-10);
            $this->SetFont('Courier', '', 10);

            $this->Cell(0,10,utf8_decode('Página: ' . $this->PageNo()), 'T', 0, 'C');

        }

        function Cabecera_archivos(){

            $this->Cell(15,8,utf8_decode('#'), 'B', 0);
            #Tipo de archivo
            $this->Cell(30,8,utf8_decode('Tipo'), 'B', 0);
            #Nombre de archivo
            $this->Cell(60,8,utf8_decode('Nombre'), 'B', 0);
            #Tamaño de archivo
            $this->Cell(75,8,utf8_decode('Tamaño'), 'B', 1, 0);
        }
    }
?>