<?php

namespace Mango\API\RestBundle\Serializer;

use Doctrine\Common\Util\Inflector;
use Hateoas\Serializer\JsonSerializerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class JsonApiSerializer
 * @package Mango\JsonApi\Serializer
 */
class JsonApiSerializer implements JsonSerializerInterface
{
    /**
     * @var Link[]
     */
    protected $links = array();
    protected $relations = array();

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @param Link[] $links
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeLinks(array $links, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        if (!is_array($visitor->getRoot())) {
            $visitor->setRoot(array());
        }

        $serializedLinks = array();
        $topLevelLinks = array();

        foreach ($links as $link) {
            $serializedLink = array_merge(array(
                'href' => $link->getHref(),
            ), $link->getAttributes());

            if (isset($serializedLink['topLevel']) && true === $serializedLink['topLevel']) {
                unset($serializedLink['topLevel']);
                unset($serializedLink['href']);

                // Set href to the path/pattern for this link
                $serializedLink['href'] = $link->getPath();

                // Top level links need the resource that this relation belongs to prefixed.
                $rel = $link->getRel();

                $this->links[$rel] = $link;
                $topLevelLinks[$rel] = $serializedLink;
                continue;
            }

            if (!isset($serializedLinks[$link->getRel()]) && 'curies' !== $link->getRel()) {
                $serializedLinks[$link->getRel()] = $serializedLink;
            } elseif (isset($serializedLinks[$link->getRel()]['href'])) {
                $serializedLinks[$link->getRel()] = array(
                    $serializedLinks[$link->getRel()],
                    $serializedLink
                );
            } else {
                $serializedLinks[$link->getRel()][] = $serializedLink;
            }
        }

        if (!empty($topLevelLinks)) {
//            $visitor->setRoot(
//                array_replace_recursive($visitor->getRoot(), array(
//                    'links' => $topLevelLinks
//                ))
//            );
        }

        if (!empty($serializedLinks)) {
            $visitor->addData('links', $serializedLinks);
        }
    }

    /**
     * Called when the visited object has one or more embedded relations. Here we can define how we process those
     * embedded relations. In this case, we build an array out of it.
     *
     * @param array $embeddeds
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeEmbeddeds(array $embeddeds, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        // TODO: Refactor the way includes are handled
        $includes = array_map('trim', explode(',', $this->request->get('include')));

        $links = array();

        // Slowly build "linked" to a full stacked relation hierarchy.
        foreach ($embeddeds as $embedded) {
            $ids = array();

            if (!in_array($embedded->getRel(), $includes)) {
                //continue;
            }

            // Is this a single embedded resource?
            $single = false;

            if ($embedded->getData() instanceof \Traversable || is_array($embedded->getData())) {
                foreach ($embedded->getData() as $data) {
                    $this->appendId($ids, $data);
                    $rel = $this->getRelationKey($embedded->getRel());
                    $this->addRelation($rel, $context->accept($data));
                }
            } else {
                $single = true;
                $this->appendId($ids, $embedded->getData());
                $rel = $this->getRelationKey($embedded->getRel());
                $this->addRelation($rel, $context->accept($embedded->getData()));
            }

            if (!empty($ids)) {
                $links[$embedded->getRel()] = ($single) ? reset($ids) : $ids;
                $visitor->addData($embedded->getRel(), ($single) ? reset($ids) : $ids);
            }
        }

        // Add embedded resource as links.
        if (!empty($links)) {
            //$visitor->addData('links', $links);
        }

        $relations = $this->getRelations();

        if (!empty($relations)) {
            $root = $visitor->getRoot();
            $root['linked'] = $relations;
            $visitor->setRoot($root);
        }
    }

    protected function appendId(&$ids, $object)
    {
        $id = null;
        if (is_callable(array($object, 'getId'))) {
            $id = $object->getId();
        }

        if ($id && !in_array($id, $ids)) {
            $ids[] = $id;
        }
    }

    /**
     * @return array
     */
    protected function getRelations()
    {
        return $this->relations;
    }

    /**
     * Add linked relation
     *
     * @param $rel
     * @param $data
     */
    protected function addRelation($rel, $data)
    {
        if (!$data) {
            return;
        }

        if (!isset($this->relations[$rel])) {
            $this->relations[$rel] = array();
        }

        if (!in_array($data, $this->relations[$rel])) {
            $this->relations[$rel][] = $data;
        }
    }

    /**
     * Get the name of the relation key. We use the links that where defined in order to determine the correct type.
     *
     * @param $rel
     * @return mixed
     */
    protected function getRelationKey($rel)
    {
        // Search for any links that may be defined for this relation.
        if (isset($this->links[$rel])) {
            $link = $this->links[$rel];
            $attributes = $link->getAttributes();

            // We have a type defined for this relation, this means we override the $resourceKey
            if (isset($attributes['type'])) {
                return $attributes['type'];
            }
        }

        return Inflector::pluralize($rel);
    }
}