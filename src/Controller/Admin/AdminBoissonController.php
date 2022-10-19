<?php

namespace App\Controller\Admin;

use App\Entity\Boisson;
use App\Form\BoissonType;
use App\Repository\BoissonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
     * @Route("/admin/boisson")
     */
class AdminBoissonController extends AbstractController
{
    
    /**
     * @Route("/admin_boisson", name="admin_boisson")
     */
    public function index(BoissonRepository $boissonRepository): Response
    {
        return $this->render('admin_boisson/index.html.twig', [
            'boissons' => $boissonRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/new", name="admin_boisson_new")
     */
    public function new(Request $request, BoissonRepository $boissonRepository): Response
    {
        $boisson = new Boisson();
        $form = $this->createForm(BoissonType::class, $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boissonRepository->add($boisson);

            $this->addFlash("success", "Le menu n°" . $boisson->getId() . " à bien été créé");
            
            return $this->redirectToRoute('admin_boisson', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boisson/new.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

   
    /**
     * @Route("/{id}", name="admin_boisson_show")
     */
    public function show(Boisson $boisson): Response
    {
        return $this->render('admin_boisson/show.html.twig', [
            'boisson' => $boisson,
        ]);
    }

    
    /**
     * @Route("/{id}/edit", name="admin_boisson_edit")
     */
    public function edit(Request $request, Boisson $boisson, BoissonRepository $boissonRepository): Response
    {
        $form = $this->createForm(BoissonType::class, $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boissonRepository->add($boisson);

            $this->addFlash("success", "Le menu n°" . $boisson->getId() . " à bien été modifié");

            return $this->redirectToRoute('admin_boisson', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boisson/edit.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/{id}", name="admin_boisson_delete")
     */
    public function delete(Request $request, Boisson $boisson, BoissonRepository $boissonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boisson->getId(), $request->request->get('_token'))) {
            
            
            $boissonRepository->remove($boisson);
            $this->addFlash("success", "Le menu n°" . $boisson->getId() . " à bien été supprimé");

        }

        return $this->redirectToRoute('admin_boisson_index', [], Response::HTTP_SEE_OTHER);
    }
}
