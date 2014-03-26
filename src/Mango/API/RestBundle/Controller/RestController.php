<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/03/14
 * Time: 15:44
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandler;

/**
 * Class RestController
 * @package Mango\API\RestBundle\Controller
 */
class RestController extends FOSRestController
{
    /**
     * @return ActionHandler
     */
    public function getActionHandler()
    {
        return $this->get('mango_api_rest.action_handler');
    }
} 