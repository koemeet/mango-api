<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 12:43
 */

namespace Mango\API\RestBundle\Serializer;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class SerializerContext
 *
 * @package Mango\API\RestBundle\Serializer
 */
class SerializerContext
{
    protected $includes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->includes = new ArrayCollection();
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param $name
     */
    public function addInclude($name)
    {
        $this->includes->add($name);
    }

    /**
     * @return ArrayCollection
     */
    public function getIncludes()
    {
        return $this->includes;
    }
} 