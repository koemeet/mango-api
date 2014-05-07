<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 07/05/14
 * Time: 14:45
 */

namespace Mango\API\RestBundle\Serializer;

/**
 * Class Link
 * @package Mango\API\RestBundle\Serializer
 */
class Link extends \Hateoas\Model\Link
{
    protected $path;

    /**
     * @param string $rel
     * @param string $href
     * @param array $path
     * @param array $attributes
     */
    public function __construct($rel, $href, $path, array $attributes = array())
    {
        parent::__construct($rel, $href, $attributes);
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