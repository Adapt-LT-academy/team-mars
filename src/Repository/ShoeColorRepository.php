<?php

namespace App\Repository;

use App\Entity\ShoeColor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShoeColor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoeColor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoeColor[]    findAll()
 * @method ShoeColor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoeColorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShoeColor::class);
    }

//    /**
//     * @return ShoeColor[] Returns an array of ShoeColor objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShoeColor
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
