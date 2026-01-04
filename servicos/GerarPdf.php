<?php 

require "plugins/composer/vendor/autoload.php";
use Dompdf\Dompdf;

session_start();

if (!isset($_SESSION['cliente']) && !isset($_SESSION['dados'])) {

    throw new Exception('Ocorreu um erro, tente novamente!');
}

$nome_cliente = strtoupper($_SESSION['dados'][0]['nome_cliente']);

$dompdf = new Dompdf();
$html = "<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Diário Pessoal - $nome_cliente</title>

    <!-- https://www.fecap.br/wp-content/uploads/2021/04/Manual-ABNT-2021-1.pdf -->
    <style>
        * {
            font-family: Arial, 'Times New Roman', Times;
        }

        /* CAPA DO ARQUIVO ------------- */
        .capa {
            text-align: center;
            font-size: 16px;
            font-weight: 700;
        }

        .capa p#nome_cliente {
            margin-top: 220px;
        }

        .capa .titulo-trabalho {
            margin-top: 220px;
            margin-bottom: 220px;
        }

        /* CORPO DO ARQUIVO ------------- */
        .container {
            margin-left: 3cm;
            margin-top: 3cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        .body-box {
            font-size: 14px;
        }

        /* .body-box .pag {
            color: #5c5c5c;
            margin-left: 100%;
            transform: translateX(-3cm);
        } */

        .body-box .text-container {
            display: grid;
            grid-template-columns: 1fr;
            row-gap: 5rem;
            margin-top: 50px;
        }

        .body-box .titulo {
            font-weight: 700;
        }

        .body-box .text {
            text-align: justify;
            justify-content: left;
            text-indent: 20px;
        }
    </style>
</head>

<body>
    <div class='container main-box'>

        <div class='capa'>
            <div class='row'>

                <div>
                    <p class='clinica'>CLINICA EXEMPLO </p>
                    <p id='nome_cliente'> $nome_cliente </p>
                </div>

                <div class='titulo-trabalho'>
                    <p>DIÁRIO PESSOAL </p>
                </div>

                <div class='localizacao'>
                    <span>Ourinhos </span><br>
                    <span>2023 </span>
                </div>
            </div>
        </div>
    </div>

    <div class='container body-box'>
        <!-- <div class='pag'>
            <p>num pag</p>
        </div> -->

        <div class='text-container'>";

for($i= 0; $i < count($_SESSION['dados']); $i++) {
    
    $dados = $_SESSION['dados'];

    $html .= "<div class='content'>
                <p class='titulo'><span class='pag'> ". $dados[$i]['numero_pagina'] ." </span>.". $dados[$i]['titulo_pagina'] ."</p>
                <p class='text'> ". $dados[$i]['texto_pagina'] ." </p>
              </div>";

}

$html .= "</div></div></body></html>";
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("Diario Pessoal - $nome_cliente.pdf");
?>