<?php

namespace App\Repository;

use App\Entity\ClientCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClientCompte>
 *
 * @method ClientCompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientCompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientCompte[]    findAll()
 * @method ClientCompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientCompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientCompte::class);
    }

//    /**
//     * @return ClientCompte[] Returns an array of ClientCompte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClientCompte
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
