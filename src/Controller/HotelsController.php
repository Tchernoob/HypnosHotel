<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelsController extends AbstractController
{
    #[Route('/hotels', name: 'app_hotels')]
    public function index(HotelRepository $hotelRepository): Response
    {
        return $this->render('www-front/hotels/hotels.html.twig', [
            'hotels' => $hotelRepository->viewHotels(),
        ]);
    }
}
