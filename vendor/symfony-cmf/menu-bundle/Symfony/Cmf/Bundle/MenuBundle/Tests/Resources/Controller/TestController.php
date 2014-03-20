<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2013 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Symfony\Cmf\Bundle\MenuBundle\Tests\Resources\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('::index.html.twig');
    }

    public function renderAction(Request $request)
    {
        return $this->render('::tests/render.html.twig');
    }

    public function linkTestRouteAction(Request $request)
    {
        return $this->render('::linkTestRoute.html.twig');
    }
}
