<?php

namespace App\Repository;

use App\Entity\Bookings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bookings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bookings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bookings[]    findAll()
 * @method Bookings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bookings::class);
    }

    /**
     * @return Bookings[] Returns an array of Bookings objects
     */
    
    public function findAllByDate($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.beginAt = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findBookingStatus($value)
    {
    $entityManager = $this->getEntityManager();
    $query = $entityManager->createQuery(
        'SELECT p.status
        FROM App\Entity\Bookings p
        WHERE p.beginAt = :val'
    )->setParameter('val', $value);
    // returns an array of Booking objects
    return $query->execute();

    }

    /*
    public function findOneBySomeField($value): ?Bookings
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
