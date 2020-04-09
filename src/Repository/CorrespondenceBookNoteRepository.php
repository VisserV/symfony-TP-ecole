<?php

namespace App\Repository;

use App\Entity\CorrespondenceBookNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CorrespondenceBookNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorrespondenceBookNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorrespondenceBookNote[]    findAll()
 * @method CorrespondenceBookNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrespondenceBookNoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CorrespondenceBookNote::class);
    }

    // /**
    //  * @return CorrespondenceBookNote[] Returns an array of CorrespondenceBookNote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CorrespondenceBookNote
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
