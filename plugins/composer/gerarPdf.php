<?php 

require "./vendor/autoload.php";
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml(
    '<!DOCTYPE html>
    <html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Diário Pessoal - $cli["nome"]</title>
    
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <style>
            * {
                font-family: Arial, Helvetica, sans-serif;
            }
    
            .capa {
                margin: 3px;
                padding: 12px;
            }
            
            .capa {
                text-align: center;
                font-size: 16px;
                font-weight: 700;
            }
            .capa p {
                margin-bottom: 5%;
            }
            .capa p#nome_aluno {
                margin-top: 270px;
            }
    
            .capa .titulo-trabalho {
                margin-top: 270px;
                margin-bottom: 270px;
            }
    
            .col-lg-12 {
                text-align: center;
                align-items: center;
            }
        </style>
    </head>
    
    <body>
        <div class="container main-box">
    
            <div class="capa">
                <div class="row">
    
                    <div">
                        <p>CLINICA EXEMPLO </p>

                        <p id="nome_aluno">$cli["nome"] </p>
                    </div>
    
                    <div class="titulo-trabalho">
                        <p>DIÁRIO PESSOAL </p>
                        <p>$diario["titulo_pagina"] </p>
                    </div>
    
                    <div>
                        <span>Ourinhos </span><br>
                        <span>2023 </span>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    </body>
    
    </html>'
);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('Diario_Pessoal.pdf');
