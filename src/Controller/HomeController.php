<?php
namespace App\Controller;

use App\Repository\PropertyRepository;
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
    public function index(PropertyRepository $repository): Response
    {
        $properties = $repository->findLatest();
        return $this->render('pages/home.html.twig',
            ['properties' => $properties]    
        );
    }
}