<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/04/14
 * Time: 17:30
 */

namespace Mango\CoreDomainBundle\Document;

use Mango\CoreDomain\Model\Image as BaseImage;
use PHPCR\NodeInterface;
use PHPCR\PropertyInterface;

/**
 * Class Image
 * @package Mango\CoreDomainBundle\Document
 */
class Image extends BaseImage
{
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
}