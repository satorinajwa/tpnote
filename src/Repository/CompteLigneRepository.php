<?php

namespace App\Repository;

use App\Entity\CompteLigne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompteLigne>
 *
 * @method CompteLigne|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteLigne|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteLigne[]    findAll()
 * @method CompteLigne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteLigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteLigne::class);
    }

//    /**
//     * @return CompteLigne[] Returns an array of CompteLigne objects
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

//    public function findOneBySomeField($value): ?CompteLigne
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
