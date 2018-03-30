<?php

namespace App\Repository;

use App\Entity\EducationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EducationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationType[]    findAll()
 * @method EducationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EducationType::class);
    }

//    /**
//     * @return EducationType[] Returns an array of EducationType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EducationType
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
