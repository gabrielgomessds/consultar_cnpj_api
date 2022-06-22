<?php

require __DIR__.'/vendor/autoload.php';

use \App\WebService\Speedio;
use \App\View\Renderiza;

//Nova instancia de Speedio

$obSpeedio = new Speedio;
$view = new Renderiza;

$cnpj = $_POST['cnpj'];

$resultado = $obSpeedio->consultarCnpj($cnpj);


//Verifica o resultado da consulta

if(empty($resultado)){
    die('Problemas ao consultar o CNPJ');
}

//Verifica o Erro da requisição
if(isset($resultado['error'])){
    die($resultado['error']);
}

echo $view->renderizarHtml('index.php', [
    'dados' => $resultado
]);

//Imprimir dados de sucesso
/* echo "RAZÃO SOCIAL: ".$resultado['RAZAO SOCIAL']."<br/>";
echo "CPNJ: ".$cnpj."<br/>";
echo "STATUS: ".$resultado['STATUS']."<br/>";
echo "DESCRIÇÃO: ".$resultado['CNAE PRINCIPAL DESCRICAO']."<br/>"; */

