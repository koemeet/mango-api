<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/05/14
 * Time: 15:13
 */

namespace Mango\API\RestBundle\Serializer\Visitor;

use Doctrine\Common\Util\Inflector;
use FOS\RestBundle\Util\Inflector\DoctrineInflector;
use FOS\RestBundle\Util\Inflector\InflectorInterface;
use JMS\Serializer\Context;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

/**
 * Class JsonSerializationVisitor
 * @package Mango\API\RestBundle\Serializer
 */
class JsonSerializationVisitor extends \JMS\Serializer\JsonSerializationVisitor
{
    protected $rootName;

    /**
     * @return string
     */
    public function getResult()
    {
        $rootName = $this->rootName;
        $root = $this->getRoot();

        // Check if there are relations that belong to the primary resource
        if (isset($root['linked']) && isset($root['linked'][$rootName])) {
            $primary = $root['linked'][$rootName];
            foreach ($primary as $item) {
                // If they are not already inside the primary root, append it :)
                if (isset($root[$rootName]) && !in_array($item, $root[$rootName])) {
                    $root[$rootName][] = $item;
                }
            }
            unset($root['linked'][$rootName]);
        }

        // Set it again :)
        $this->setRoot($root);

        return parent::getResult();
    }

    public function startVisitingObject(ClassMetadata $metadata, $data, array $type, Context $context)
    {
        if (!$this->rootName) {
            $this->rootName = $this->getCollectionName($data);
        }

        return parent::startVisitingObject($metadata, $data, $type, $context);
    }

    protected function getCollectionName($object) {
        $className = get_class($object);
        if (strpos($className, '\\') !== false) {
            $className = substr($className, strrpos($className, '\\') + 1);
        }

        $inflector = new Inflector();

        return strtolower($inflector->pluralize($className));
    }
}