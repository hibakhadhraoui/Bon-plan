<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query;
use App\Entity\UserSearch;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllUser(UserSearch $search) : Query
    {
        $query = $this->createQueryBuilder('p');

        if ($search->getEmail()) {
            $query = $query->andWhere('p.email like :email ')
                ->setParameter('email', '%' . $search->getEmail() . '%');
        }

        if ($search->getFirstname()) {
            $query = $query->andWhere('p.firstname like :firstname ')
                ->setParameter('firstname', '%' . $search->getFirstname() . '%');
        }

        if ($search->getLastname()) {
            $query = $query->andWhere('p.lastname like :lastname ')
                ->setParameter('lastname', '%' . $search->getLastname() . '%');
        }

        return $query->getQuery();
    }

    // /**
    //  * @return User[] Returns an array of User objects
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
    public function findOneBySomeField($value): ?User
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
