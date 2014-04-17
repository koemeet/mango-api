<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 17/04/14
 * Time: 15:53
 */

namespace Mango\CoreDomain\DataTransformer;

/**
 * Interface DataTransformerInterface
 * @package Mango\CoreDomain\DataTransformer
 */
interface DataTransformerInterface
{
    /**
     * Transform object to a DTO.
     *
     * @param $value
     * @return mixed
     */
    public function transform($value);

    /**
     * Reverse transform a DTO to a domain object.
     *
     * @param $value
     * @return mixed
     */
    public function reverseTransform($value);
} 