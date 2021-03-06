<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/index', name: 'app_home')]
    public function index(HotelRepository $hotelRepository): Response
    {
        return $this->render('www-front/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
