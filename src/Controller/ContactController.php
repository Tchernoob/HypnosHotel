<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\ContactService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function indexRequest(Request $request, ContactService $contactService): Response
    {

        $contact = new Contact();

        $form  = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        // Vérification de traitement de données
        if ($form->isSubmitted() && $form->isValid())
        {
            $contact  = $form->getData();
            
            $contactService->persistContact($contact);

            return $this->redirectToRoute('index');
        }

        return $this->renderForm('www-front/contact/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
