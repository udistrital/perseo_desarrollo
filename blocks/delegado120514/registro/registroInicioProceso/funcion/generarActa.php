<?php

if (!isset($GLOBALS["autorizado"])) {
    include("index.php");
    exit;
}	
$ruta=$this->miConfigurador->getVariableConfiguracion('raizDocumento');
include($ruta.'/classes/html2pdf/html2pdf.class.php');

//$directorio=$this->miConfigurador->getVariableConfiguracion("rutaUrlBloque")."/";
$directorio=$this->miConfigurador->getVariableConfiguracion("rutaBloque");

$contenidoPagina = "<page backtop='30mm' backbottom='10mm' backleft='20mm' backright='20mm'>";
$contenidoPagina .= "<page_header>
        <table align='center' style='width: 100%;'>
            <tr>
                <td align='center' >
                    <img src='".$directorio."css/images/escudo.jpg'>
                </td>
                <td align='center' >
                    <font size='18px'><b>UNIVERSIDAD DISTRITAL</b></font>
                    <br>
                    <font size='18px'><b>FRANCISCO JOSÉ DE CALDAS</b></font>
                    <br>
                    <font size='9px'><b>1948 - ".date('Y')." SESENTA Y CINCO A&Ntilde;OS DE VIDA UNIVERSITARIA</b></font>
                </td>
                <td align='center' >
                    <img src='".$directorio."css/images/sabio.jpg' width='60'>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table align='center' width = '100%'>
            <tr>
                <td align='center'>
                    <img src='".$directorio."css/images/escudo.jpg'>
                </td>
            </tr>
            <tr>
                <td align='center'>
                    Universidad Distrital Francisco José de Caldas
                    <br>
                    Todos los derechos reservados.
                    <br>
                    Carrera 8 N. 40-78 Piso 1 / PBX 3238400 - 3239300
                    <br>
                    elecciones@udistrital.edu.co                    
                </td>
            </tr>
        </table>
    </page_footer>";

//$contenidoPagina .= "<page>";
    $contenidoPagina .= $_POST['textoActa'];
$contenidoPagina .= "</page>";


    $html2pdf = new HTML2PDF('P','LETTER','es');
    $res = $html2pdf->WriteHTML($contenidoPagina);
    $html2pdf->Output('actaInicio.pdf','D');
?>