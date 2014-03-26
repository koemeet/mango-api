<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/03/14
 * Time: 11:15
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class PostsController
 * @package Mango\API\RestBundle\Controller
 */
class PostsController extends FOSRestController
{
    public function getPostsAction()
    {
        return array (
            'posts' => array(
                array (
                    'id' => 1,
                    'title' => 'Rails is omakase',
                    'comments' =>
                        array (
                            0 => 1,
                            1 => 2,
                        ),
                    'user' => 'dhh',
                ),
            ),
            'comments' =>
                array (
                    0 =>
                        array (
                            'id' => 1,
                            'body' => 'Rails is unagi',
                        ),
                    1 =>
                        array (
                            'id' => 2,
                            'body' => 'Omakase O_o',
                        ),
                )
        );
    }

    public function getPostAction($id)
    {
        return array (
            'posts' =>
                array (
                    'id' => 1,
                    'title' => 'Rails is omakase',
                    'comments' =>
                        array (
                            0 => '1',
                            1 => '2',
                        ),
                    'user' => 'dhh',
                ),
            'comments' =>
                array (
                    0 =>
                        array (
                            'id' => '1',
                            'body' => 'Rails is unagi',
                        ),
                    1 =>
                        array (
                            'id' => '2',
                            'body' => 'Omakase O_o',
                        ),
                ),
        );
    }
} 