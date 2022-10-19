<?php

namespace App\Controller\Admin;

use App\Data\Filter;
use App\Entity\AdminCategorieMenus;
use App\Entity\Produit;
use App\Form\ProduitType;
use App\Form\FilterProduitType;
use App\Form\Filtre2Type;
use App\Repository\AdminCategorieMenusRepository;
use App\Repository\CategorieProduitRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    /**
     * @Route("/admin/produit")
     */
class AdminProduitController extends AbstractController
{
    /**
     * @Route("/liste-produit/{cat}", name="produit_afficher",defaults={"cat" : null})
     */
    public function produit_afficher(ProduitRepository $produitRepository, Request $request,CategorieProduitRepository $categorieProduitRepository,$cat): Response
    {
        
        
        
        //Récupération de la liste des catégorie
        $listCategorieProduit=$categorieProduitRepository->findAll();

        
        //rechercher un objet
        $categorie = $categorieProduitRepository->findOneBy(["titre" => $cat]);

        
        

        if ($cat) {//si $cat est présent il va aller chercher la catégorie
            $produits = $produitRepository->findBy(["categorie" => $categorie]);
        }else{//sinon il va tout récupérer
            $produits = $produitRepository->findAll();
        }




        

        return $this->render('admin_produit/afficher.html.twig', [
            'produits' => $produits,
            
            // "formFilter" => $form->createView()

            //envoie de la liste des catégorie à la vue
            "listCategorieProduit" =>$listCategorieProduit,
            
            
        ]);
    }

    
    /**
     * @Route("/ajouter-produit", name="admin_produit_ajouter")
     */
    public function ajouter_produit(Request $request, ProduitRepository $produitRepository): Response
    {
       
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $produitRepository->add($produit);

            $this->addFlash("success", "Le produit n°" . $produit->getId() . " à bien été ajouté");


            return $this->redirectToRoute('produit_afficher', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_produit/ajouter.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/modifier-produit/{id}", name="produit_modifier")
     */
    public function produit_modifier(Produit $produit): Response
    {
        return $this->render('admin_produit/modifier.html.twig', [
            'produit' => $produit,
        ]);
    }

  
    /**
     * @Route("/edit-produit/{id}", name="app_admin_produit_edit")
     */
    public function edit(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produitRepository->add($produit);

            $this->addFlash("success", "Le produit n°" . $produit->getId() . " à bien été modifié");

            return $this->redirectToRoute('produit_afficher', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/delete-produit/{id}", name="app_admin_produit_delete")
     */
    public function delete(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $produitRepository->remove($produit);
            
            $this->addFlash("success", "Le produit n°" . $produit->getId() . " à bien été supprimé");

        }

        return $this->redirectToRoute('produit_afficher', [], Response::HTTP_SEE_OTHER);
    }


   
}
