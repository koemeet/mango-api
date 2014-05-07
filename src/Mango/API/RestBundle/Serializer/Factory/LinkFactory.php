<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 07/05/14
 * Time: 14:04
 */

namespace Mango\API\RestBundle\Serializer\Factory;

use Hateoas\Configuration\Relation;
use Hateoas\Configuration\Route;
use Hateoas\Expression\ExpressionEvaluator;
use Mango\API\RestBundle\Serializer\Link;
use Hateoas\UrlGenerator\UrlGeneratorRegistry;
use Symfony\Cmf\Component\Routing\ChainRouter;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class LinkFactory
 * @package Mango\API\RestBundle\Serializer
 */
class LinkFactory extends \Hateoas\Factory\LinkFactory
{
    /**
     * @var ExpressionEvaluator
     */
    private $expressionEvaluator;

    /**
     * @var UrlGeneratorRegistry
     */
    private $urlGeneratorRegistry;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @param ExpressionEvaluator $expressionEvaluator
     * @param UrlGeneratorRegistry $urlGeneratorRegistry
     * @param \Symfony\Component\Routing\RouterInterface $router
     */
    public function __construct(ExpressionEvaluator $expressionEvaluator, UrlGeneratorRegistry $urlGeneratorRegistry, RouterInterface $router)
    {
        $this->expressionEvaluator  = $expressionEvaluator;
        $this->urlGeneratorRegistry = $urlGeneratorRegistry;
        $this->router = $router;
    }

    /**
     * @param object $object
     * @param Relation $relation
     * @return \Hateoas\Model\Link|Link
     * @throws \RuntimeException
     */
    public function createLink($object, Relation $relation)
    {
        $rel =  $this->expressionEvaluator->evaluate($relation->getName(), $object);
        $href = $relation->getHref();

        if ($href instanceof Route) {
            if (!$this->urlGeneratorRegistry->hasGenerators()) {
                throw new \RuntimeException('You cannot use a route without an url generator.');
            }

            $generator = $this->urlGeneratorRegistry->get($href->getGenerator());
            $path = $generator->generate($href->getName(), array('id' => '{id}'), true);
            // Decode curly braces
            $path = str_replace(array('%7B', '%7D') , array('{', '}'), $path);

            $name       = $this->expressionEvaluator->evaluate($href->getName(), $object);
            $parameters = is_array($href->getParameters())
                ? $this->expressionEvaluator->evaluateArray($href->getParameters(), $object)
                : $this->expressionEvaluator->evaluate($href->getParameters(), $object)
            ;
            $isAbsolute = $this->expressionEvaluator->evaluate($href->isAbsolute(), $object);

            if (!is_array($parameters)) {
                throw new \RuntimeException(
                    sprintf(
                        'The route parameters should be an array, %s given. Maybe you forgot to wrap the expression in expr(...).',
                        gettype($parameters)
                    )
                );
            }

            $href = $generator->generate($name, $parameters, $isAbsolute)
            ;
        } else {
            $href = $this->expressionEvaluator->evaluate($href, $object);
        }

        $attributes = $this->expressionEvaluator->evaluateArray($relation->getAttributes(), $object);

        return new Link($rel, $href, $path, $attributes);
    }

    /**
     * @param $routeName
     * @return string
     */
    protected function getPath($routeName)
    {
        $route = $this->router->getRouteCollection()->get($routeName);

        $context = $this->router->getContext();
        $host = $context->getHost();
        $scheme = $context->getScheme();

        $port = '';
        if ('http' === $scheme && 80 != $context->getHttpPort()) {
            $port = ':'.$this->router->getContext()->getHttpPort();
        } elseif ('https' === $scheme && 443 != $context->getHttpsPort()) {
            $port = ':'.$context->getHttpsPort();
        }

        $schemeAuthority = $scheme . "://";
        $schemeAuthority .= $host.$port;

        $url = $schemeAuthority . $context->getBaseUrl() . $route->getPath();

        return substr($url, 0, -10);
    }
} 