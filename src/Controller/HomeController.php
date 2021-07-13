<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Classe permettant de gérer l'affichage de la page racine
 * 
 */
class HomeController extends AbstractController {
    /**
     * @Route("/", name="home")
     * 
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }
}