<?php

namespace App\Repository;

use App\Entity\UserPending;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserPending|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPending|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPending[]    findAll()
 * @method UserPending[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPendingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserPending::class);
    }

    // /**
    //  * @return UserPending[] Returns an array of UserPending objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserPending
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
