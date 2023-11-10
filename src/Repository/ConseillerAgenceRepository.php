<?php

namespace App\Repository;

use App\Entity\ConseillerAgence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConseillerAgence>
 *
 * @method ConseillerAgence|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConseillerAgence|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConseillerAgence[]    findAll()
 * @method ConseillerAgence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseillerAgenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConseillerAgence::class);
    }

//    /**
//     * @return ConseillerAgence[] Returns an array of ConseillerAgence objects
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

//    public function findOneBySomeField($value): ?ConseillerAgence
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
