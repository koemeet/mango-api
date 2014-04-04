<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 21:31
 */

namespace Mango\CoreDomain\Model;

/**
 * Class ApplicationPlatform
 * @package Mango\CoreDomain\Model
 */
class ApplicationPlatform
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var Application
     */
    protected $application;


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
     * Set type
     *
     * @param string $type
     * @return ApplicationPlatform
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set application
     *
     * @param Application $application
     * @return ApplicationPlatform
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