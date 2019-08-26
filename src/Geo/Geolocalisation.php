<?php


namespace App\Geo;


use App\Entity\Events;

class Geolocalisation
{
    private $address;

    public function __construct(string $s)
    {
        $this->address = $s;
    }
    function geolocalise(Events $events)
    {
$city = str_replace(' ', '+',$events->getVille());
$this->address.= strtolower($city);
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->address);
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c, CURLOPT_TIMEOUT, 4);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($c);
        $response = json_decode($response,true);
        curl_close($c);

        return $response;

    }
}