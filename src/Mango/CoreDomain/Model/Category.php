<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 25/04/14
 * Time: 16:38
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Category
 * @package Mango\CoreDomain\Model
 */
class Category
{
    protected $id;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Category
     */
    protected $parent;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @param Category $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return Category
     */
    public function getParent()
    {
        return $this->parent;
    }
}