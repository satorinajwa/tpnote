<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Client;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    #[Route('/client', name: 'app_client')]
    public function getAllClients(ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $managerRegistry->getManager();
        $clients = $entityManager->getRepository(Client::class)->findAll();
        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }


    #[Route('/client/{id}', name: 'client_details')]
    public function showClientDetails(int $id,ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $managerRegistry->getManager();
        $clients = $entityManager->getRepository(Client::class)
        ->createQueryBuilder('c')
        ->where('c.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();

        if (!$clients) {
            throw $this->createNotFoundException('Client not found');
        }

        return $this->render('client/ClientById.html.twig', [
            'clients' => $clients,
        ]);
    }


}
