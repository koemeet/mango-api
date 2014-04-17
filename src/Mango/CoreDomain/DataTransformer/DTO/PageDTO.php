<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 17/04/14
 * Time: 15:55
 */

namespace Mango\CoreDomain\DataTransformer\DTO;
use Mango\CoreDomain\Model\Page;

/**
 * Class Page
 * @package Mango\CoreDomain\DataTransformer\DTO
 */
class PageDTO
{
    protected $title;
    protected $body;
    protected $image;

    /**
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->title = $page->getTitle();
        $this->body = $page->getBody();
        $this->image = $page->getImage();
    }

    /**
     * @param \Mango\CoreDomain\Model\Page $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \Mango\CoreDomain\Model\Page
     */
    public function getTitle()
    {
        return $this->title;
    }
}