<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request): Response
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            // $form->get('email')->getData();
       
             $this->addFlash('success', "Votre message a bien été envoyé");   
             
             
             echo "<h1 class='display-4'>toto</h1>";

            return $this->redirectToRoute('contact');
        }

    // a mettre ici peut être : return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        return $this->render('contact/contact.html.twig', [
            // 'controller_name' => 'ContactController',
            'contactForm' => $form->createView(),
        ]);
        
    }
}
