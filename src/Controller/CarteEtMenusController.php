<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteEtMenusController extends AbstractController
{
    #[Route('/carte/et/menus', name: 'app_carte_et_menus')]
    public function index(): Response
    {
        return $this->render('carte_et_menus/index.html.twig', [
            'controller_name' => 'CarteEtMenusController',
        ]);
    }
}
