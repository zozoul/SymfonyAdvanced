<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
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
     * @var ObjectManager
     */
    private $em;
    
    /**
     * Constructeur
     */
    public function __construct(PropertyRepository $repository, EntityManagerInterface  $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="property.index")
     * 
     * @return Response
     */
    public function index(): Response
    {
        // Récupérer un seul bien
       //$property = $this->repository->find(1);
       // Recupérer tous les biens
       //$property = $this->repository->findAll();
       // Récupérer avec conditions
      // $property = $this->repository->findOneBy(['floor' => 4]);
       // Récupérer avec des conditions spécifiques
       $property = $this->repository->findAllVisible();
      /* $property[0]->setSold(false);
       $this->em->flush();
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

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * 
     * @return Response
     */
    public function show($slug, $id): Response
    {
        $property = $this->repository->find($id);
        return $this->render('property/show.html.twig',[
            'property'     => $property,
            'current_menu' => 'properties'
        ]);
    }
}