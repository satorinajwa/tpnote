<?php

namespace App\Repository;

use App\Entity\Comptebancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comptebancaire>
 *
 * @method Comptebancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comptebancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comptebancaire[]    findAll()
 * @method Comptebancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptebancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comptebancaire::class);
    }

//    /**
//     * @return Comptebancaire[] Returns an array of Comptebancaire objects
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

//    public function findOneBySomeField($value): ?Comptebancaire
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
