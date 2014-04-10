<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 16:18
 */

namespace Mango\CoreDomainBundle\Document;

use Mango\CoreDomain\Model\Page as BasePage;

/**
 * Class Page
 *
 * @package Mango\CoreDomainBundle\Document
 */
class Page extends BasePage
{
    protected $path;

    protected $parent;

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}