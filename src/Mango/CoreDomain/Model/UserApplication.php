<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 11:51
 */

namespace Mango\CoreDomain\Model;

/**
 * Class UserApplication
 *
 * @package Mango\CoreDomain\Model
 */
class UserApplication
{
    protected $id;

    protected $create = true;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var Permission[]
     */
    protected $permissions;

    /**
     * @param Application $application
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param Permission[] $permissions
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return Permission[]
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
} 