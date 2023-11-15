<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
   

    #[Route('/home', name: 'app_client')]
    public function getAllClients(ManagerRegistry $managerRegistry): Response
    {
        $entityManager = $managerRegistry->getManager();
        $clients = $entityManager->getRepository(Client::class)->findAll();
        return $this->render('home/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    }


