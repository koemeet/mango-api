<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 21:13
 */

namespace Mango\CoreDomainBundle\Document;

use Mango\CoreDomain\Model\Category as BaseCategory;

/**
 * Class Category
 *
 * @package Mango\CoreDomainBundle\Document
 */
class Category extends BaseCategory
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