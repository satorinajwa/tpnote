<?php

namespace App\Repository;

use App\Entity\ConseillerBancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConseillerBancaire>
 *
 * @method ConseillerBancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConseillerBancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConseillerBancaire[]    findAll()
 * @method ConseillerBancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseillerBancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConseillerBancaire::class);
    }

//    /**
//     * @return ConseillerBancaire[] Returns an array of ConseillerBancaire objects
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

//    public function findOneBySomeField($value): ?ConseillerBancaire
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
