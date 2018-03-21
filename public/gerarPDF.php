<?php 
    
$html = '
    <html>
        <head>
            <style>
            body {
                font-family: Arial;
                font-size: 10pt;
            }
            p {	margin: 0pt; }
            table.items {
                border: 0.1mm solid #000000;
            }
            td { vertical-align: top; }
            .items td {
                border-left: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            table thead td { 
                background-color: #EEEEEE;
                text-align: center;
                font-weight: bold;
                border: 0.1mm solid #000000;
                
            }
            table tbody td
            {
                background-color: rgba(180, 189,200, 0.7);
            }
            .items td.blanktotal {
                background-color: #EEEEEE;
                border: 0.1mm solid #000000;
                background-color: #FFFFFF;
                border: 0mm none #000000;
                border-top: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            </style>
        </head>
        <body>
            <!--mpdf
            <htmlpageheader name="myheader">
            <table width="100%">
                <tr>
                    <td width="25%" style="color:#0000BB; "><img src="img/logotipo.png" style="width: 160px; height: 160px;"></td>
                    <td width="40%" style="text-align: center;"><b><h2>Produtos em Estoque</h2></b><br><br><br><div style="text-align: center">Gerado em '.date('d/m/Y').' as '.date('H:i').'</div></td>
                    <td width="25%" style="text-align: right;">Doc.No.<br /><span style="font-weight: bold; font-size: 12pt;">00001</span></td>
                </tr>
            </table>
            </htmlpageheader>

            <htmlpagefooter name="myfooter">
                <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
                Pagina {PAGENO} de {nb}
                </div>
                <div style="text-align: left; font-size: 12px; padding-top: 3px;">
                    <p><b>Nome da Empresa</b></p>
                    <p>Tel: (15)9999-9999 Email: exemplo@exemplo.com.br</p>
                </div>
            </htmlpagefooter>

            <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
            <sethtmlpagefooter name="myfooter" value="on" />
            
            <br />
            <br />


            <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
                <thead>
                    <tr>
                        <td width="15%">Código</td>
                        <td width="15%">Descrição</td>
                        <td width="15%">Marca</td>
                        <td width="15%">Série</td>
                        <td width="15%">Tipo</td>
                        <td width="15%">Quantidade</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">00000100</td>
                        <td align="center">Luzes de led</td>
                        <td align="center">G&E</td>
                        <td align="center">0E120D</td>
                        <td align="center">DIGITAL</td>
                        <td align="center">200 Unid.</td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>
';
$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once $path . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 10,
	'margin_right' => 8,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);
$arquivo = "Produtos em Estoque - ".date("M");
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Produtos em Estoque");
$mpdf->SetAuthor("Teste Ltda.");
$mpdf->SetWatermarkText("Cancelado");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'Arial';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output($arquivo, "I");