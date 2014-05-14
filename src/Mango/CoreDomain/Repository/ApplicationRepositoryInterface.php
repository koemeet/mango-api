<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 16:39
 */

namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface ApplicationRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface ApplicationRepositoryInterface extends RepositoryInterface
{
    /**
     * Create a new application object.
     *
     * @return Application
     */
    public function createApplication();

    /**
     * Add an application.
     *
     * @param Application $application
     * @return bool
     */
    public function add(Application $application);

    /**
     * Removes the given Application.
     *
     * @param Application $application
     * @return bool
     */
    public function remove(Application $application);

    /**
     * Find applications by user.
     *
     * @param User  $user
     * @param Query $query
     * @return mixed
     */
    public function findByUser(User $user, Query $query);
}