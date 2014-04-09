<?php

namespace Mango\API\RestBundle\Serializer;

use Doctrine\ORM\PersistentCollection;
use Hateoas\Model\Embedded;
use Hateoas\Model\Link;
use Hateoas\Serializer\JsonSerializerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use Mango\API\DomainBundle\Entity\Customer;

/**
 * Class JsonApiSerializer
 * @package Mango\JsonApi\Serializer
 */
class JsonApiSerializer implements JsonSerializerInterface
{
    /**
     * @param Link[] $links
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeLinks(array $links, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        $serializedLinks = array();

        foreach ($links as $link) {
            $serializedLink = array_merge(array(
                'href' => $link->getHref(),
            ), $link->getAttributes());

            // Support multiple relations of same type
            if (!isset($serializedLinks[$link->getRel()])) {
                $serializedLinks[$link->getRel()] = $serializedLink;
            } else {
                $serializedLinks[$link->getRel()][] = $serializedLink;
            }
        }

        $visitor->addData('_links', $serializedLinks);
    }

    /**
     * @param Embedded[] $embeddeds
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeEmbeddeds(array $embeddeds, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        $serializedEmbeds = array();

        foreach ($embeddeds as $embed) {
            $data = $embed->getData();
            $ids = array();

            // Can we iterate over the given data?
            if ($data instanceof \Traversable) {
                foreach ($data as $object) {
                    if (is_callable(array($object, 'getId'))) {
                        $ids[] = $object->getId();
                    }
                }
            } else {
                if (is_callable(array($data, 'getId'))) {
                    $ids = $data->getId();
                }
            }

            if (!empty($ids)) {
                $visitor->addData($embed->getRel(), $ids);
            }

            // Visit every node and whe get a nice serialized array :)
            $serializedEmbeds[$embed->getRel()] = $context->accept($embed->getData());
        }

        // We want to override existing root elements when adding embedded resources
        if ($serializedEmbeds && is_array($visitor->getRoot())) {
            $visitor->setRoot(array_replace_recursive($visitor->getRoot(), $serializedEmbeds));
        } else {
            $visitor->setRoot($serializedEmbeds);
        }
    }
}