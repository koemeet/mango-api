<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 29/03/14
 * Time: 17:55
 */

namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Model\Workspace;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface UserRepositoryInterface
 * @package Mango\API\DomainBundle\Repository
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Creata and return a new user
     *
     * @return User
     */
    public function createUser();

    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return PaginatedResult
     */
    public function findByQuery(Query $query);

    /**
     * Adds a new user.
     *
     * @param User $user
     * @return mixed
     */
    public function add(User $user);

    /**
     * Update a user.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user);

    /**
     * Remove a user.
     *
     * @param User $user
     * @return mixed
     */
    public function remove(User $user);

    /**
     * Find users by workspace and optionally a query.
     *
     * @param Workspace $workspace
     * @param Query     $query
     * @return mixed
     */
    public function findByWorkspace(Workspace $workspace, Query $query = null);
}