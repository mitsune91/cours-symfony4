<?php

namespace App\Controller;

use App\Geo\Geolocalisation;
use App\Repository\ActualiteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Events;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(UserRepository $user, ActualiteRepository $actualiteRepository)
    {



          return $this->render('index/index.html.twig', [

            'user'=> $user,
            'actus' => $actualiteRepository->findAll(),

        ]);
    }
}
