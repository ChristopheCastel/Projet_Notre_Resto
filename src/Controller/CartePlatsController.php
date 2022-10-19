<?php

namespace App\Controller;

use App\Repository\CategorieProduitRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartePlatsController extends AbstractController
{
    #[Route('/carte/plats', name: 'app_carte_plats')]
    /**
     * @Route("/carte/plats", name="carte_plats")
     */
    public function index(ProduitRepository $produitRepository, CategorieProduitRepository $categorieProduitRepository): Response
    {
        // dump($produitRepository);
        // dump($categorieProduitRepository);

        return $this->render('carte_plats/index.html.twig', [
            "produits" => $produitRepository->findAll(),
            "categorieProduit"=>$categorieProduitRepository->findAll()
        ]);
    }
}
