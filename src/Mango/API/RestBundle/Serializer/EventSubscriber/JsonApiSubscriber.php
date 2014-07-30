<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/05/14
 * Time: 14:16
 */

namespace Mango\API\RestBundle\Serializer\EventSubscriber;

use Hateoas\Factory\EmbeddedsFactory;
use Hateoas\Factory\LinksFactory;
use Hateoas\Serializer\JsonSerializerInterface;
use Hateoas\Serializer\Metadata\InlineDeferrer;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use Mango\API\RestBundle\Serializer\JsonHalSerializer;
use Mango\API\RestBundle\Serializer\SerializerContext;
use Mango\API\RestBundle\Serializer\View;

class JsonApiSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event'  => Events::POST_SERIALIZE,
                'format' => 'json',
                'method' => 'onPostSerialize',
            ),
        );
    }

    /**
     * @var JsonSerializerInterface
     */
    private $jsonSerializer;

    /**
     * @var LinksFactory
     */
    private $linksFactory;

    /**
     * @var EmbeddedsFactory
     */
    private $embeddedsFactory;

    /**
     * @var InlineDeferrer
     */
    private $embeddedsInlineDeferrer;

    /**
     * @var InlineDeferrer
     */
    private $linksInlineDeferrer;

    /**
     * @param JsonHalSerializer $jsonSerializer
     * @param LinksFactory $linksFactory
     * @param EmbeddedsFactory $embeddedsFactory
     * @param InlineDeferrer $embeddedsInlineDeferrer
     * @param InlineDeferrer $linksInleDeferrer
     */
    public function __construct(
        JsonHalSerializer $jsonSerializer,
        LinksFactory $linksFactory,
        EmbeddedsFactory $embeddedsFactory,
        InlineDeferrer $embeddedsInlineDeferrer,
        InlineDeferrer $linksInleDeferrer
    ) {
        $this->jsonSerializer          = $jsonSerializer;
        $this->linksFactory            = $linksFactory;
        $this->embeddedsFactory        = $embeddedsFactory;
        $this->embeddedsInlineDeferrer = $embeddedsInlineDeferrer;
        $this->linksInlineDeferrer     = $linksInleDeferrer;
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $object  = $event->getObject();
        $context = $event->getContext();

        $embeddeds = $this->embeddedsFactory->create($object, $context);
        $links     = $this->linksFactory->create($object, $context);

        $embeddeds = $this->embeddedsInlineDeferrer->handleItems($object, $embeddeds, $context);
        $links  = $this->linksInlineDeferrer->handleItems($object, $links, $context);

        if (count($links) > 0) {
            $this->jsonSerializer->serializeLinks($links, $event->getVisitor(), $context);
        }

        if (count($embeddeds) > 0) {
            $this->jsonSerializer->serializeEmbeddeds($embeddeds, $event->getVisitor(), $context, $object);
        }
    }

    /**
     * We are serializing the root object.
     *
     * @param ObjectEvent $event
     */
    public function customIekkss(ObjectEvent $event)
    {
        /** @var View $object */
//        $object = $event->getObject();
//        $context = $event->getContext();
//
//        /** @var JsonSerializationVisitor $visitor */
//        $visitor = $event->getVisitor();
//
//        // We use "root" for populating our result, because we need to operate on root level.
//        $visitor->setRoot(array());
//
//        // Serialize the data (probably domain models) that the view contains.
//        $data = $context->accept($object->getData());
//        $data = (is_array($object->getData())) ? $data : array($data);
//
//        // Get the root after we finished visiting objects.
//        $root = $visitor->getRoot();
//
//        // Replace
//        $root['applications'] = $data;
//
//        $visitor->setRoot($root);
    }
} 