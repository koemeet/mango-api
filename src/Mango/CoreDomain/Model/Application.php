<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 21:26
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Application
 * @package Mango\CoreDomain\Model
 */
class Application
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $syncWithAlias;

    /**
     * @var Application
     */
    protected $alias;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * User which created this application
     *
     * @var User
     */
    protected $createdByUser;

    /**
     * Company who owns this application
     *
     * @var Company
     */
    protected $company;

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
     * Set name
     *
     * @param string $name
     * @return Application
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
     * Set syncWithAlias
     *
     * @param string $syncWithAlias
     * @return Application
     */
    public function setSyncWithAlias($syncWithAlias)
    {
        $this->syncWithAlias = $syncWithAlias;

        return $this;
    }

    /**
     * Get syncWithAlias
     *
     * @return string
     */
    public function getSyncWithAlias()
    {
        return $this->syncWithAlias;
    }

    /**
     * Set alias
     *
     * @param Application $alias
     * @return Application
     */
    public function setAlias(Application $alias = null)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return Application
     */
    public function getAlias()
    {
        return $this->alias;
    }
} 