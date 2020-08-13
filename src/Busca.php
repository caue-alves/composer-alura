<?php

namespace Alura\Buscador;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Busca
{
    private $HTTPclient;
    private $crawler;

    public function __construct($client, $TheCrawlwer)
    {
        $this->HTTPclient = $client;
        $this->crawler = $TheCrawlwer;
    }

    public function buscar($url, $elementoCSS)
    {
        $corpo = $this->HTTPclient->request('GET', $url);
        $html = $corpo->getBody();
        $this->crawler->addHtmlContent($html);
        $elementos = $this->crawler->filter("$elementoCSS");

        $array = [] ;
        foreach ($elementos as $elemento) {
            $array[] = $elemento->textContent;
        }
        return $array;
    }
}
