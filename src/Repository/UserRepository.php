<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    /** EntityManager $manager */
    private $manager;

    /** UserPasswordEncoderInterface $encoder */
    private $encoder;

    /**
     * UsersRepository constructor.
     * @param RegistryInterface $registry
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(ManagerRegistry $registry, UserPasswordEncoderInterface $encoder)
    {
        parent::__construct($registry, User::class);
        $this->manager = $registry->getManager();
        $this->encoder = $encoder;
    }

    /**
     * Create a new user
     * @param $data
     * @return User
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createNewUser($data)
    {
        $user = new User();
        $user->setEmail($data['email'])
            ->setUsername($data['username'])
            // ->setRoles($data['role'])
            ->setPassword($this->encoder->encodePassword($user, $data['password']));
        $this->manager->persist($user);
        $this->manager->flush();
        return $user;
    }

    public function loadUserByUsername($usernameOrEmail)
    {
        return $this->createQuery(
                'SELECT u
                FROM App\Entity\User u
                WHERE u.username = :query
                OR u.email = :query'
            )
            ->setParameter('query', $usernameOrEmail)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
