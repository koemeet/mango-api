<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/04/14
 * Time: 17:20
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Image
 * @package Mango\CoreDomain\Model
 */
class Image
{
    protected $id;

    /**
     * @var string
     */
    protected $name;

    protected $content;

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

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

    public function getURL()
    {
        return "http://www.456456gfhfghfgh.nl/api/image?id=" . $this->getId();
    }
} 