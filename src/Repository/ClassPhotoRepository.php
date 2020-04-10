<?php

namespace App\Repository;

use App\Entity\ClassPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ClassPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassPhoto[]    findAll()
 * @method ClassPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassPhoto::class);
    }

    // /**
    //  * @return ClassPhoto[] Returns an array of ClassPhoto objects
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
    public function findOneBySomeField($value): ?ClassPhoto
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
