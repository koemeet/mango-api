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
     * @param \Mango\CoreDomain\Model\Category $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return \Mango\CoreDomain\Model\Category
     */
    public function getParent()
    {
        return $this->parent;
    }
}