<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 11:08
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Workspace
 * @package Mango\CoreDomain\Model
 */
class Workspace
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var User[]
     */
    protected $users;

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * Add user to workspace.
     *
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }
} 