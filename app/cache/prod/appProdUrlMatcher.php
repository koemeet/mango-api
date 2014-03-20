<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // mango_api_docs_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'mango_api_docs_homepage');
            }

            return array (  '_controller' => 'Mango\\API\\DocsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'mango_api_docs_homepage',);
        }

        // mango_api_docs_console
        if ($pathinfo === '/console') {
            return array (  '_controller' => 'Mango\\API\\DocsBundle\\Controller\\ConsoleController::indexAction',  '_route' => 'mango_api_docs_console',);
        }

        if (0 === strpos($pathinfo, '/v1')) {
            if (0 === strpos($pathinfo, '/v1/customers')) {
                // new_customers
                if (0 === strpos($pathinfo, '/v1/customers/new') && preg_match('#^/v1/customers/new(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_new_customers;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'new_customers')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::newCustomersAction',  '_format' => 'json',));
                }
                not_new_customers:

                // get_customers
                if (preg_match('#^/v1/customers(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_customers;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_customers')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::getCustomersAction',  '_format' => 'json',));
                }
                not_get_customers:

                // get_customer
                if (preg_match('#^/v1/customers/(?P<id>[^/\\.]++)(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_customer;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_customer')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\CustomersController::getCustomerAction',  '_format' => 'json',));
                }
                not_get_customer:

            }

            if (0 === strpos($pathinfo, '/v1/users')) {
                // new_users
                if (0 === strpos($pathinfo, '/v1/users/new') && preg_match('#^/v1/users/new(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_new_users;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'new_users')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::newUsersAction',  '_format' => 'json',));
                }
                not_new_users:

                // get_users
                if (preg_match('#^/v1/users(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_users;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_users')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::getUsersAction',  '_format' => 'json',));
                }
                not_get_users:

                // get_user
                if (preg_match('#^/v1/users/(?P<id>[^/\\.]++)(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_user;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_user')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::getUserAction',  '_format' => 'json',));
                }
                not_get_user:

                // post_users
                if (preg_match('#^/v1/users(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_post_users;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'post_users')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::postUsersAction',  '_format' => 'json',));
                }
                not_post_users:

                // put_user
                if (preg_match('#^/v1/users/(?P<id>[^/\\.]++)(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_put_user;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'put_user')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\UsersController::putUserAction',  '_format' => 'json',));
                }
                not_put_user:

            }

            // get_routes
            if (0 === strpos($pathinfo, '/v1/routes') && preg_match('#^/v1/routes(?:\\.(?P<_format>xml|json|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_routes;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_routes')), array (  '_controller' => 'Mango\\API\\RestBundle\\Controller\\RoutesController::getRoutesAction',  '_format' => 'json',));
            }
            not_get_routes:

        }

        // fos_oauth_server_token
        if ($pathinfo === '/oauth/v2/token') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_oauth_server_token;
            }

            return array (  '_controller' => 'fos_oauth_server.controller.token:tokenAction',  '_route' => 'fos_oauth_server_token',);
        }
        not_fos_oauth_server_token:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
