<?php

namespace App\Repository;

use App\Entity\LigneCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneCompte>
 *
 * @method LigneCompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneCompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneCompte[]    findAll()
 * @method LigneCompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneCompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneCompte::class);
    }

//    /**
//     * @return LigneCompte[] Returns an array of LigneCompte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LigneCompte
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
