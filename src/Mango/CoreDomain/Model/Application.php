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
     * @var Application
     */
    protected $relatedTo;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Module[]
     */
    protected $modules;

    /**
     * @var Workspace
     */
    protected $workspace;

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
     * @param Workspace $workspace
     */
    public function setWorkspace(Workspace $workspace)
    {
        $this->workspace = $workspace;
    }

    /**
     * @return Workspace
     */
    public function getWorkspace()
    {
        return $this->workspace;
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
     * @param Company $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \DateTime $createdOn
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param Application $application
     */
    public function setRelatedTo(Application $application)
    {
        $this->relatedTo = $application;
    }

    /**
     * @return Application
     */
    public function getRelatedTo()
    {
        return $this->relatedTo;
    }

    /**
     * @param Module[] $modules
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
    }

    /**
     * Add module to application.
     *
     * @param Module $module
     */
    public function addModule(Module $module)
    {
        $this->modules[] = $module;
    }

    /**
     * @return Module[]
     */
    public function getModules()
    {
        return $this->modules;
    }
}