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
use Mango\CoreDomain\Repository\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package Mango\CoreDomainBundle\Repository
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
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
        $this->userManager = $userManager;
        parent::__construct($entityManager);
    }

    /**
     * Creata and return a new user
     *
     * @return User
     */
    public function createUser()
    {
        return $this->userManager->createUser();
    }

    /**
     * Adds a new user.
     *
     * @param User $user
     * @return mixed
     */
    public function add(User $user)
    {
        $this->em->persist($user);
        $this->em->flush($user);
    }

    /**
     * Update a user.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        $this->em->persist($user);
        $this->em->flush($user);
    }

    /**
     * Remove a user.
     *
     * @param User $user
     * @return mixed
     */
    public function remove(User $user)
    {
        $this->em->remove($user);
        $this->em->flush($user);
    }

    /**
     * Find a user by it's email.
     *
     * @param $email
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->userManager->findUserByEmail($email);
    }
}