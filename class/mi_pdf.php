<?php 
    class mi_pdf extends FPDF {
        function Header(){
            $encabezado1 = "Gestión Rally";
            $encabezado2 = "Antonio Manuel Ramírez de la Rosa";
            $this->SetFont('Times', '', 12);
            $this->Cell(90,10,utf8_decode($encabezado1),'B',0,'L');
            $this->Cell(90,10,utf8_decode($encabezado2),'B',1,'R');
        }

        function Footer(){
            $this->SetY(-10);
            $this->SetFont('Times', '', 12);

            $this->Cell(0,10,utf8_decode('Página: ' . $this->PageNo()), 'T', 0, 'C');

        }

        function Cabecera_archivos(){

            $this->Cell(10,8,utf8_decode('#'), 'B', 0);
            #Tipo de archivo
            $this->Cell(20,8,utf8_decode('Marca'), 'B', 0);
            #Nombre de archivo
            $this->Cell(60,8,utf8_decode('Modelo'), 'B', 0);
            #Tamaño de archivo
            $this->Cell(50,8,utf8_decode('Equipo'), 'B', 0);

            $this->Cell(40,8,utf8_decode('Cilindrada'), 'B', 1, 1);
        }
    }
?>