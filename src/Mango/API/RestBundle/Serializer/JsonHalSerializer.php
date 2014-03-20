<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/03/14
 * Time: 21:53
 */

namespace Mango\API\RestBundle\Serializer;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class JsonHalSerializer
 *
 * Custom serializer for handling embedded resources.
 *
 * @package Mango\API\RestBundle\Serializer
 */
class JsonHalSerializer extends \Hateoas\Serializer\JsonHalSerializer
{
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
     * {@inheritdoc}
     */
    public function serializeEmbeddeds(array $embeddeds, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        $t = $this->request->get('embedded');

        $pieces = array_map('trim', explode(',', $t));

        $serializedEmbeddeds = array();
        foreach ($embeddeds as $embedded) {
            if (in_array($embedded->getRel(), $pieces)) {
                $serializedEmbeddeds[$embedded->getRel()] = $context->accept($embedded->getData());
            }
        }

        if ($serializedEmbeddeds) {
            $visitor->addData('_embedded', $serializedEmbeddeds);
        }
    }
} 