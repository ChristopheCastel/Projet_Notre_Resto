<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation(): Response
    {
        return $this->render('home/presentation.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }

      /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions(): Response
    {
        return $this->render('home/mentions-legales.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/actualités", name="actualites")
     */
    public function actualites(): Response
    {
        return $this->render('home/actualites.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/reserver", name="reserver")
     */
    public function reserver(): Response
    {
        return $this->render('home/reserver.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }
    
}


