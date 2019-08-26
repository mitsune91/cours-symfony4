<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use function Sodium\add;

class HtmlExtension extends AbstractExtension
{

    public function getFilters()
    {
        return [
            new TwigFilter('figure', [$this, 'figureFilter'], array('is_safe' => array('html'))),
            new TwigFilter('link', [$this, 'wikiLink'], array('is_safe' => array('html')))
        ];
    }

    public function figureFilter($image, $desc)
    {


        $figure = '<figure><img src="' . $image . '"><figcaption>' . $desc . '</figcaption></figure>';
        return $figure;
    }

    public function wikiLink($link,$artiste)
    {


        $wikiLink = '<a href="' . $link . '"> '.$link.' </a>';
        return $wikiLink;
    }


}