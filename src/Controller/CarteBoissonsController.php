<?php

namespace App\Controller;

use App\Repository\BoissonRepository;
use App\Repository\CategorieBoissonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteBoissonsController extends AbstractController
{
    
    /**
     * @Route("/carte/boissons", name="carte_boissons")
     */
    public function index(BoissonRepository $boissonRepository, CategorieBoissonRepository $categorieBoissonRepository): Response
    {
        // dump($boissonRepository->findAll());
        // dump($categorieBoissonRepository->findAll());

        return $this->render('carte_boissons/carte-boissons.html.twig', [
            'boissons' => $boissonRepository->findAll(),
            'categorie' => $categorieBoissonRepository->findAll()

        ]);
    }
}
