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

/**
 * Interface ApplicationRepositoryInterface
 * @package Mango\CoreDomain\Repository
 */
interface ApplicationRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * Add an Application.
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
     * @return Application
     */
    public function createApplication();
}