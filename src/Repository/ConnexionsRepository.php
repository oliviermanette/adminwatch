<?php

namespace App\Repository;

use App\Entity\Connexions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Connexions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Connexions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Connexions[]    findAll()
 * @method Connexions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConnexionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Connexions::class);
    }

    // /**
    //  * @return Connexions[] Returns an array of Connexions objects
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
    public function findOneBySomeField($value): ?Connexions
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
