<?php

namespace Mango\API\RestBundle\Serializer;

use Doctrine\ORM\PersistentCollection;
use Hateoas\Model\Embedded;
use Hateoas\Model\Link;
use Hateoas\Serializer\JsonSerializerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\VisitorInterface;
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
     * Called on every object that needs to be serialized.
     *
     * @param Embedded[] $embeddeds
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeEmbeddeds(array $embeddeds, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        foreach ($embeddeds as $embed) {
            // Fk off..
            if (!$embed->getData()) {
                continue;
            }

            // We need to serialize it right away, otherwise bad things will happen...
            $data = $context->accept($embed->getData());

            // Store current root array
            $root = $visitor->getRoot();

            if (!array_key_exists($embed->getRel(), $root)) {
                $root[$embed->getRel()] = array();
            }

            $ids = array();

            if ($embed->getData() instanceof \Traversable) {
                foreach ($data as $item) {
                    if (array_key_exists('id', $item)) {
                        $ids[] = $item['id'];
                    }

                    // Only add embedded object if it's not already inside the root
                    if (!in_array($item, $root[$embed->getRel()])) {
                        array_push($root[$embed->getRel()], $item);
                    }
                }
            } else {
                if (array_key_exists('id', $data)) {
                    $ids = $data['id'];
                }

                if (!in_array($data, $root[$embed->getRel()])) {
                    array_push($root[$embed->getRel()], $data);
                }
            }

            if (!empty($ids)) {
                $visitor->addData($embed->getRel(), $ids);
            }

            $visitor->setRoot($root);
        }
    }
}