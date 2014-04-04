<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 21:32
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Module
 * @package Mango\CoreDomain\Model
 */
class Module
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Module
     */
    protected $parent;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return Module
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Module
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set parent
     *
     * @param Module $parent
     * @return Module
     */
    public function setParent(Module $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return Module
     */
    public function getParent()
    {
        return $this->parent;
    }
} 