<?php

namespace App\Repository;

use App\Entity\LignesCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LignesCompte>
 *
 * @method LignesCompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method LignesCompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method LignesCompte[]    findAll()
 * @method LignesCompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignesCompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LignesCompte::class);
    }

//    /**
//     * @return LignesCompte[] Returns an array of LignesCompte objects
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

//    public function findOneBySomeField($value): ?LignesCompte
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
