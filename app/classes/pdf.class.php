<?php 


namespace app\classes;


class Pdf
{
    public function CriarPdf($pagina, $arquivo, $metodo)
    {
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($pagina);

        $mpdf->Output($arquivo, "'".$metodo."'");
    }
}

