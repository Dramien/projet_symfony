<?php

namespace App\Repository;

use App\Entity\Bien;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }

    /**
     * @return Query
     */
    public function findPaginateBien(Search $search)
    {

        $query = $this->createQueryBuilder('biens')
                    ->andWhere('biens.titre LIKE :searchTitre')
                    ->setParameter('searchTitre', '%'.addcslashes($search->getSearchTitre(), '%_').'%');

        if ($search->getSearchPrix()) {

            $query = $query->andWhere('biens.prix <= :searchPrix')
                        ->setParameter('searchPrix', $search->getSearchPrix());

        }

        return $query->getQuery();
    }

    // /**
    //  * @return Bien[] Returns an array of Bien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bien
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
