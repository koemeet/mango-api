<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:38
 */

namespace Mango\API\RestBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Class CorsListener
 * @package Mango\API\RestBundle\EventListener
 */
class CorsListener
{
    /**
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if ($event->getRequest()->getMethod() == "OPTIONS") {
            $response = $event->getResponse();

            // GG, cache this fck head
            $response->setSharedMaxAge(86400);
            $response->setMaxAge(86400);

            // If we get a method not allowed, we reset the response to 200 OK
            if ($response->getStatusCode() == 405) {
                $response->setStatusCode(200);
                $response->setContent(null);
            }
        }

        // Add headers for CORS support
        $event->getResponse()->headers->add(array(
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Credentials" => false,
            "Access-Control-Allow-Methods" => "GET, POST, PUT, DELETE, OPTIONS",
            "Access-Control-Allow-Headers" => "Origin, X-Requested-With, Content-Type, Accept, Authorization",
            "Access-Control-Max-Age" => 86400
        ));
    }
} 