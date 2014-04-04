<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 29/03/14
 * Time: 17:55
 */

namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\User;

/**
 * Interface UserRepositoryInterface
 * @package Mango\API\DomainBundle\Repository
 */
interface UserRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * Creata and return a new user
     *
     * @return User
     */
    public function create();

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
}