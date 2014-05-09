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
use Mango\CoreDomain\Model\Workspace;
use Mango\CoreDomain\Persistence\Query;
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

    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model)
    {
        return $this->em->getUnitOfWork()->getEntityIdentifier($model);
    }

    /**
     * Find all objects.
     *
     * @return mixed
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Find users by workspace and optionally a query.
     *
     * @param Workspace $workspace
     * @param Query     $query
     * @return mixed
     */
    public function findByWorkspace(Workspace $workspace, Query $query = null)
    {
        $qb = $this->getQueryBuilder($this->class, $query);
        $qb->innerJoin('t.workspaces', 'workspace')
            ->andWhere('workspace = :workspace')->setParameter('workspace', $workspace);

        return $qb->getQuery()->getResult();
    }


}