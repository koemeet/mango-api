<?php

namespace Jackalope\Transport;
use Jackalope\Property;

/**
 * Representing a property remove operation.
 *
 * @license http://www.apache.org/licenses Apache License Version 2.0, January 2004
 * @license http://opensource.org/licenses/MIT MIT License
 */
class RemovePropertyOperation extends Operation
{
    /**
     * The item to remove
     *
     * @var Property
     */
    public $property;

    /**
     * Whether this remove operations was later determined to be skipped
     * (i.e. a parent node is removed as well.)
     *
     * @var bool
     */
    public $skip = false;

    public function __construct($srcPath, Property $property)
    {
        parent::__construct($srcPath, self::REMOVE_PROPERTY);
        $this->property = $property;
    }
}
