<?php

require_once __DIR__.'/AppKernel.php';

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AppCache
 */
class AppCache extends HttpCache
{
    protected function getOptions()
    {
        return array(
            'debug'                  => false,
            'default_ttl'            => 0,
            'private_headers'        => array('Authorization', 'Cookie'),
            'allow_reload'           => false,
            'allow_revalidate'       => false,
            'stale_while_revalidate' => 2,
            'stale_if_error'         => 60,
        );
    }

    protected function invalidate(Request $request, $catch = false)
    {
        if ('PURGE' !== $request->getMethod()) {
            return parent::invalidate($request, $catch);
        }

        $response = new Response();
        $response->headers->add(array(
            "Content-Type" => "application/json"
        ));

        if ($this->getStore()->purge($request->getUri())) {
            $response->setContent(json_encode(array("success" => true)));
            $response->setStatusCode(Response::HTTP_OK, 'Purged');
        } else {
            $response->setContent(json_encode(array("success" => false)));
            $response->setStatusCode(Response::HTTP_NOT_FOUND, 'Not purged');
        }

        return $response;
    }
}
