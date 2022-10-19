<?php

namespace App\Controller\Admin;

use App\Entity\AdminCategorieMenus;
use App\Form\AdminCategorieMenusType;
use App\Repository\AdminCategorieMenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


    /**
     * @Route("/admin/categorie/menus")
     */
class AdminCategorieMenusController extends AbstractController
{
    
    /**
     * @Route("/liste-categorie", name="categorie_afficher")
     */
    public function index(AdminCategorieMenusRepository $adminCategorieMenusRepository): Response
    {
        return $this->render('admin_categorie_menus/index.html.twig', [
            'admin_categorie_menuses' => $adminCategorieMenusRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/ajouter-categorie", name="app_admin_categorie_menus_new")
     */
    public function new(Request $request, AdminCategorieMenusRepository $adminCategorieMenusRepository): Response
    {
        $adminCategorieMenu = new AdminCategorieMenus();
        $form = $this->createForm(AdminCategorieMenusType::class, $adminCategorieMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adminCategorieMenusRepository->add($adminCategorieMenu);

            $this->addFlash("success", "Le menu n°" . $adminCategorieMenu->getId() . " à bien été créé");


            return $this->redirectToRoute('categorie_afficher', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_menus/new.html.twig', [
            'admin_categorie_menu' => $adminCategorieMenu,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/modifier-categorie/{id}", name="app_admin_categorie_menus_show")
     */
    public function show(AdminCategorieMenus $adminCategorieMenu): Response
    {
        return $this->render('admin_categorie_menus/show.html.twig', [
            'admin_categorie_menu' => $adminCategorieMenu,
        ]);
    }

   
    /**
     * @Route("/edit-categorie/{id}", name="app_admin_categorie_menus_edit")
     */
    public function edit(Request $request, AdminCategorieMenus $adminCategorieMenu, AdminCategorieMenusRepository $adminCategorieMenusRepository): Response
    {
        $form = $this->createForm(AdminCategorieMenusType::class, $adminCategorieMenu);
        $form->handleRequest($request);

        
        

        if ($form->isSubmitted() && $form->isValid()) {
            $adminCategorieMenusRepository->add($adminCategorieMenu);

            $this->addFlash("success", "Le menu n°" . $adminCategorieMenu->getId() . " à bien été modifié");


            return $this->redirectToRoute('categorie_afficher', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_menus/edit.html.twig', [
            'admin_categorie_menu' => $adminCategorieMenu,
            'form' => $form,
        ]);
    }

    
     /**
     * @Route("/delete-categorie/{id}", name="app_admin_categorie_menus_delete")
     */
    public function delete(Request $request, AdminCategorieMenus $adminCategorieMenu, AdminCategorieMenusRepository $adminCategorieMenusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adminCategorieMenu->getId(), $request->request->get('_token'))) {
            $adminCategorieMenusRepository->remove($adminCategorieMenu);

            $this->addFlash("success", "Le menu n°" . $adminCategorieMenu->getId() . " à bien été supprimé");

        }

        return $this->redirectToRoute('categorie_afficher', [], Response::HTTP_SEE_OTHER);
    }
}
