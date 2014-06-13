<?php

namespace Mango\API\DocsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MangoAPIDocsBundle:Default:index.html.twig');
    }
}
