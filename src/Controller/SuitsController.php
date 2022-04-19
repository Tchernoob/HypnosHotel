<?php

namespace App\Controller;

use App\Repository\SuitRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuitsController extends AbstractController
{
    #[Route('/suits/{idHotel}', name: 'app_suits')]
    public function show($idHotel, SuitRepository $suitRepository): Response
    {
        return $this->render('www-front/suits/suits.html.twig', [
            'suits' => $suitRepository->findAll(),
        ]);
    }
}
