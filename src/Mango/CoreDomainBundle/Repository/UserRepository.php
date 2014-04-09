<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 31/03/14
 * Time: 14:59
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManagerInterface;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package Mango\CoreDomainBundle\Repository
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @var EntityManager
     */
    protected $em;

    protected $class = "MangoCoreDomain:User";

    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @param EntityManager $entityManager
     * @param UserManagerInterface $userManager
     */
    public function __construct(EntityManager $entityManager, UserManagerInterface $userManager)
    {
        $this->em = $entityManager;
        $this->userManager = $userManager;
    }

    /**
     * Creata and return a new user
     *
     * @return User
     */
    public function create()
    {
        return $this->userManager->createUser();
    }

    /**
     * Update a user.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove a user.
     *
     * @param User $user
     * @return mixed
     */
    public function remove(User $user)
    {
        // TODO: Implement remove() method.
    }


    /**
     * Find a user by it's identifier
     *
     * @param $id
     * @return User
     */
    public function find($id)
    {
        return $this->em->find($this->class, $id);
    }

    /**
     * Find a user by it's email
     *
     * @param $email
     * @param int $limit
     * @param int $offset
     * @param bool $paginated
     * @return User
     */
    public function findByEmail($email, $limit = 10, $offset = 0, $paginated = false)
    {
        return $this->userManager->findUserByEmail($email);
    }

    /**
     * Find users by criteria.
     *
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @param bool $paginated If true, it will return a paginated result, which can be used for the UI layer
     * @return User[]
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0, $paginated = false)
    {
        // TODO: Implement findBy() method.
    }

    /**
     * Find all users.
     *
     * @param int $limit
     * @param int $offset
     * @param bool $paginated If true, it will return a paginated result, which can be used for the UI layer
     * @return User[]
     */
    public function findAll($limit = 10, $offset = 0, $paginated = false)
    {
        $qb = $this->em->getRepository($this->class)->createQueryBuilder('u');
        $qb->setMaxResults($limit);
        $qb->setFirstResult($offset);

        return $qb->getQuery()->getResult();
    }

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery(Query $query)
    {
        return $this->getQueryBuilder($this->class, $query)->getQuery()->getResult();
    }
} 