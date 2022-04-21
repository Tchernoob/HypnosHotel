<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use App\Entity\Suit;
use App\Entity\Manager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('www-back/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hypnos - Back Office');
    }

    public function configureMenuItems(): iterable
    {      
        // Section accessible seulement pour les admistrateurs 
        yield MenuItem::section('Etablissements', 'fa fa-home')
            ->setPermission('ROLE_SUPER_ADMIN');

        yield MenuItem::subMenu('Gérez vos Etablissements', 'fas fa-bars')
                ->setPermission('ROLE_SUPER_ADMIN')
                ->setSubItems([
                MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Hotel::class )->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Voir', 'fas fa-eye', Hotel::class ),
        ]);

        // Sous Menu accessible seulement pour les Managers
        yield MenuItem::section('Suites')
            ->setPermission('ROLE_ADMIN');

        yield MenuItem::subMenu('Gérez vos Suites', 'fas fa-bars')
            ->setPermission('ROLE_ADMIN')
            ->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Suit::class )->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir', 'fas fa-eye', Suit::class ),
        ]);

        yield MenuItem::section('Equipes')
            ->setPermission('ROLE_SUPER_ADMIN');

        yield MenuItem::subMenu('Gérez vos Managers', 'fas fa-bars')
        ->setPermission('ROLE_SUPER_ADMIN')
        ->setSubItems([
        MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Manager::class )->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Voir', 'fas fa-eye', Manager::class ),
    ]);

        

    }
}
