<?php

namespace App\Controller;

use App\Entity\Groupes;
use App\Repository\GroupesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GroupesController extends AbstractController
{
    #[Route('/groupes/{id}', name: 'app_groupes')]
    public function index(GroupesRepository $productRepository, int $id): Response
    {
        //$product = $entityManager->getRepository(Groupes::class)->find($id);

        $product = $productRepository->findOneById($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'pas de groupe trouvé avec l\'id ' . $id
            );
        }


        return $this->render('groupes/index.html.twig', [
            'controller_name' => 'GroupesController',
            'nom_groupe' => $product->getNomGroupe()
        ]);
    }

    #[Route('/add-groupes', name: 'create_groupes')]
    public function createGroupes(EntityManagerInterface $entityManager): Response
    {
        $product = new Groupes();
        $product->setNomGroupe('Groupe test');
        $product->setLogo('test logo');
        $product->setPhoto('test photo');
        $product->setDescription('test description');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Nouveau groupe ajouté avec l\'id ' . $product->getId());
    }
}
