<?php

namespace App\Controller\Admin;

use App\Entity\CategorieBoisson;
use App\Form\CategorieBoissonType;
use App\Repository\CategorieBoissonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin/categorie/boisson")
 */
class AdminCategorieBoissonController extends AbstractController
{
    
    /**
     * @Route("/", name="admin_categorie_boisson", methods={"GET"})
     */
    public function index(CategorieBoissonRepository $categorieBoissonRepository): Response
    {
        return $this->render('admin_categorie_boisson/index.html.twig', [
            'categorie_boissons' => $categorieBoissonRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/new", name="admin_categorie_boisson_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CategorieBoissonRepository $categorieBoissonRepository): Response
    {
        $categorieBoisson = new CategorieBoisson();
        $form = $this->createForm(CategorieBoissonType::class, $categorieBoisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieBoissonRepository->add($categorieBoisson);

            $this->addFlash("success", "Le menu n°" . $categorieBoisson->getId() . " à bien été créé");

            return $this->redirectToRoute('admin_categorie_boisson', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_boisson/new.html.twig', [
            'categorie_boisson' => $categorieBoisson,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/{id}", name="admin_categorie_boisson_show", methods={"GET"})
     */
    public function show(CategorieBoisson $categorieBoisson): Response
    {
        return $this->render('admin_categorie_boisson/show.html.twig', [
            'categorie_boisson' => $categorieBoisson,
        ]);
    }

    
    /**
     * @Route("/{id}/edit", name="admin_categorie_boisson_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CategorieBoisson $categorieBoisson, CategorieBoissonRepository $categorieBoissonRepository): Response
    {
        $form = $this->createForm(CategorieBoissonType::class, $categorieBoisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieBoissonRepository->add($categorieBoisson);

            $this->addFlash("success", "Le menu n°" . $categorieBoisson->getId() . " à bien été modifié");

            return $this->redirectToRoute('admin_categorie_boisson', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_boisson/edit.html.twig', [
            'categorie_boisson' => $categorieBoisson,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/{id}", name="admin_categorie_boisson_delete", methods={"POST"})
     */
    public function delete(Request $request, CategorieBoisson $categorieBoisson, CategorieBoissonRepository $categorieBoissonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieBoisson->getId(), $request->request->get('_token'))) {
            $categorieBoissonRepository->remove($categorieBoisson);
            $this->addFlash("success", "Le menu n°" . $categorieBoisson->getId() . " à bien été supprimé");

        }

        return $this->redirectToRoute('admin_categorie_boisson', [], Response::HTTP_SEE_OTHER);
    }
}
