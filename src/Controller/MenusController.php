<?php

namespace App\Controller;

use App\Repository\AdminCategorieMenusRepository;
use App\Repository\CategorieProduitRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{
    
    /**
     * @Route("/menus", name="app_menus")
     */
    public function index(ProduitRepository $produitRepository,AdminCategorieMenusRepository $adminCategorieMenusRepository,CategorieProduitRepository $categorieProduitRepository): Response
    {
        return $this->render('menus/index.html.twig', [
            "produits" => $produitRepository->findAll(),
            "menusCat" => $adminCategorieMenusRepository->findAll(),
            "categorieProduit"=>$categorieProduitRepository->findAll()



        ]);
    }
}
