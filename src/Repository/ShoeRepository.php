<?php

namespace App\Repository;

use App\Entity\Shoe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Shoe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shoe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shoe[]    findAll()
 * @method Shoe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Shoe::class);
    }

//    /**
//     * @return Shoe[] Returns an array of Shoe objects
//     */

    public function FindItemByName()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT name FROM shoe ORDER BY name ASC'
        )
        ->getResult();
    }

    public function FindItemByType()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT type FROM shoe ORDER BY type ASC'
        )
            ->getResult();
    }
    public function FindItemByColor()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT color FROM shoe ORDER BY color ASC'
        )
            ->getResult();
    }
    public function FindItemByPrice()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT price FROM shoe ORDER BY price ASC'
        )
            ->getResult();
    }
    public function FindItemByImage()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT image FROM shoe ORDER BY image ASC'
        )
            ->getResult();
    }
}
