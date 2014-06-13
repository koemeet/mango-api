<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/05/14
 * Time: 13:18
 */

namespace Mango\API\RestBundle\Serializer;

use Mango\CoreDomain\Data\PaginatedResult;

/**
 * Class View
 * @package Mango\API\RestBundle\Serializer
 */
class View
{
    /**
     * The data to serialize.
     *
     * @var mixed
     */
    protected $data = array();

    /**
     * @param $data
     */
    public function __construct($data)
    {
        if ($data instanceof PaginatedResult) {
            $this->data = $data->getArrayCopy();
        } else {
            $this->data = $data;
        }
    }

    /**
     * @param $data
     * @return static
     */
    public static function create($data)
    {
        return new static($data);
    }

    public function getData()
    {
        return $this->data;
    }
} 