<?php

namespace Mango\API\RestBundle\Serializer;

use Hateoas\Model\Embedded;
use Hateoas\Serializer\JsonSerializerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;

/**
 * Class JsonApiSerializer
 * @package Mango\JsonApi\Serializer
 */
class JsonApiSerializer implements JsonSerializerInterface
{
    /**
     * {@inheritdoc}
     */
    public function serializeLinks(array $links, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        $serializedLinks = array();
        $topLevelSerializedLinks = array();

        foreach ($links as $link) {
            $serializedLink = array_merge(array(
                'href' => $link->getHref(),
            ), $link->getAttributes());

            if (isset($serializedLink['topLevel']) && true === $serializedLink['topLevel']) {
                unset($serializedLink['topLevel']);
                $topLevelSerializedLinks[$link->getRel()] = $serializedLink;

                continue;
            }

            if (!isset($serializedLinks[$link->getRel()])) {
                $serializedLinks[$link->getRel()] = $serializedLink['href'];
            } else {
                $serializedLinks[$link->getRel()][] = $serializedLink['href'];
            }
        }

        $visitor->addData('links', $serializedLinks);
        $visitor->setRoot(array('links' => $topLevelSerializedLinks));
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
            $serializedEmbeds[$embed->getRel()] = $context->accept($embed->getData());
        }

        $visitor->setRoot(array('linked' => $serializedEmbeds));
    }
}