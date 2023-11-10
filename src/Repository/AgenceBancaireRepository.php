<?php

namespace App\Repository;

use App\Entity\AgenceBancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgenceBancaire>
 *
 * @method AgenceBancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgenceBancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgenceBancaire[]    findAll()
 * @method AgenceBancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgenceBancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgenceBancaire::class);
    }

//    /**
//     * @return AgenceBancaire[] Returns an array of AgenceBancaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AgenceBancaire
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
