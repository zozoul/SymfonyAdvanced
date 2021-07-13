<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Classe permettant de gérer la propriété d'une page
 * 
 * 
 * 
 * @since 2021-07-12 
 */
class PropertyController extends AbstractController 
{

    /**
     * @var PropertyRepository
     */
    private $repository;
    
    /**
     * Constructeur
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/biens", name="property.index")
     * 
     * @return Response
     */
    public function index(): Response
    {
       $property = $this->repository->find(1);
       dump($property);
        /*$property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(200000)
            ->setRooms(4)
            ->setBedrooms(3)
            ->setDescription('une petite description')
            ->setSurface(60)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Montpellier')
            ->setAddress('15 Boulevard Gambetta')
            ->setPostalCode('34000');
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();*/
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}