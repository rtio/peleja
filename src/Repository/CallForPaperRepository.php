<?php

namespace App\Repository;

use App\Entity\CallForPaper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CallForPaper|null find($id, $lockMode = null, $lockVersion = null)
 * @method CallForPaper|null findOneBy(array $criteria, array $orderBy = null)
 * @method CallForPaper[]    findAll()
 * @method CallForPaper[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallForPaperRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CallForPaper::class);
    }

//    /**
//     * @return CallForPaper[] Returns an array of CallForPaper objects
//     */
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
    public function findOneBySomeField($value): ?CallForPaper
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
