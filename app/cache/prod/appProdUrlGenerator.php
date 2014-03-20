<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'mango_api_docs_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Mango\\API\\DocsBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'mango_api_docs_console' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Mango\\API\\DocsBundle\\Controller\\ConsoleController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/console',    ),  ),  4 =>   array (  ),),
        'new_customers' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::newCustomersAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/customers/new',    ),  ),  4 =>   array (  ),),
        'get_customers' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::getCustomersAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/customers',    ),  ),  4 =>   array (  ),),
        'get_customer' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::getCustomerAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/v1/customers',    ),  ),  4 =>   array (  ),),
        'new_users' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::newUsersAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/users/new',    ),  ),  4 =>   array (  ),),
        'get_users' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::getUsersAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/users',    ),  ),  4 =>   array (  ),),
        'get_user' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::getUserAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/v1/users',    ),  ),  4 =>   array (  ),),
        'post_users' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::postUsersAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'POST',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/users',    ),  ),  4 =>   array (  ),),
        'put_user' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::putUserAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'PUT',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/v1/users',    ),  ),  4 =>   array (  ),),
        'get_routes' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Mango\\API\\RestBundle\\Controller\\RoutesController::getRoutesAction',    '_format' => 'json',  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'xml|json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'xml|json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/v1/routes',    ),  ),  4 =>   array (  ),),
        'fos_oauth_server_token' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'fos_oauth_server.controller.token:tokenAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/oauth/v2/token',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
