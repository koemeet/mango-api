<?php

namespace Mango\API\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function renderAction()
    {
        return new Response("Hoi", 200);
    }
}
