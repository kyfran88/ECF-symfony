<?php

namespace App\Controller\Admin;

use App\Entity\Galerie;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator,
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
             ->setController(GalerieCrudController::class)
             ->generateUrl();
        
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Restaurant');

        yield MenuItem::subMenu('Galerie-Photos', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Galerie', 'fa fa-plus', Galerie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToDashboard('show Galeries', 'fa fa-eye', Galerie::class)
        ]);
              
        yield MenuItem::subMenu('Utilisateurs', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create User', 'fa fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToDashboard('show Users', 'fa fa-eye', User::class)
        ]);
              
        // yield MenuItem::linkToCrud('Galerie', 'fas fa-list', Galerie::class);
    }
}
