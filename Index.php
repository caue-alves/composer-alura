<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);
/*$client = new Client(['verify' => false ], ["base_uri" => "https://www.alura.com.br"])
Pode ser assim também, desse modo, quando inserirmos a url, ela só complementará a base_uri
    */

$crawler = new Crawler();

$buscador = new Alura\Buscador\Busca($client, $crawler);
$novoElemento = $buscador->buscar("https://www.alura.com.br/formacao-Python-linguagem", 'p.formacao-passo-nome');

foreach ($novoElemento as $nE) {
    echo $nE . PHP_EOL;
}