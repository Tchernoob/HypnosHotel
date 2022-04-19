<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuitsController extends AbstractController
{
    #[Route('/suits', name: 'app_suits')]
    public function index(): Response
    {
        return $this->render('suits/index.html.twig', [
            'controller_name' => 'SuitsController',
        ]);
    }
}
