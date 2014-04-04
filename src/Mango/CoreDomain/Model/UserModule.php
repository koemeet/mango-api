<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 23:12
 */

namespace Mango\CoreDomain\Model;

/**
 * Class UserModule
 * @package Mango\CoreDomain\Model
 */
class UserModule
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $enabled;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Module
     */
    protected $module;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return UserModule
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return UserModule
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set module
     *
     * @param Module $module
     * @return UserModule
     */
    public function setModule(Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set application
     *
     * @param Application $application
     * @return UserModule
     */
    public function setApplication(Application $application = null)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }
} 