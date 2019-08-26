<?php


namespace App\WikiArtiste;


use App\Entity\Artiste;

class WikiArtiste
{
    private $address;
    private $format;

    public function __construct($s,$f)
    {
        $this->address = $s;
        $this->format = $f;
    }

    public function getArtisteWiki(Artiste $artiste)
    {
        $a = str_replace(' ','_',$artiste->getNom());
        $wikiArtiste = $this->address . $a . $this->format;
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $wikiArtiste);
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c, CURLOPT_TIMEOUT, 4);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($c);
        $response = json_decode($response,true);
        curl_close($c);

        return $response;


    }
}