<?php

namespace App\Repository;

use App\Entity\Ecole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ecole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecole[]    findAll()
 * @method Ecole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecole::class);
    }

    // /**
    //  * @return Ecole[] Returns an array of Ecole objects
    //  */
   
    public function findByDifferentEcoleFormation($id)
    {
        return $this->createQueryBuilder('e')
        ->select('f.nom')
        ->innerJoin('e.formation','f')
            ->andWhere('e.id = :id')
            ->setParameter('id', $id)
            
          
          
        ;
    }
   

    /*
    public function findOneBySomeField($value): ?Ecole
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
