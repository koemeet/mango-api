<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Tests\Routing\Loader;

use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\RouteCollection;

use FOS\RestBundle\Routing\Loader\RestRouteProcessor;
use FOS\RestBundle\Routing\Loader\RestYamlCollectionLoader;

/**
 * RestYamlCollectionLoader test.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class RestYamlCollectionLoaderTest extends LoaderTest
{
    /**
     * Test that YAML collection gets parsed correctly.
     */
    public function testUsersFixture()
    {
        $collection     = $this->loadFromYamlCollectionFixture('users_collection.yml');
        $etalonRoutes   = $this->loadEtalonRoutesInfo('users_collection.yml');

        foreach ($etalonRoutes as $name => $params) {
            $route = $collection->get($name);

            $this->assertNotNull($route, $name);
            $this->assertEquals($params['pattern'], $route->getPattern(), $name);
            $this->assertEquals($params['method'], $route->getRequirement('_method'), $name);
            $this->assertContains($params['controller'], $route->getDefault('_controller'), $name);
        }
    }

    /**
     * Test that YAML collection with custom prefixes gets parsed correctly.
     */
    public function testPrefixedUsersFixture()
    {
        $collection     = $this->loadFromYamlCollectionFixture('prefixed_users_collection.yml');
        $etalonRoutes   = $this->loadEtalonRoutesInfo('prefixed_users_collection.yml');

        foreach ($etalonRoutes as $name => $params) {
            $route = $collection->get($name);

            $this->assertNotNull($route, $name);
            $this->assertEquals($params['pattern'], $route->getPattern(), $name);
            $this->assertEquals($params['method'], $route->getRequirement('_method'), $name);
            $this->assertContains($params['controller'], $route->getDefault('_controller'), $name);
        }
    }

    public function testManualRoutes()
    {
        $collection = $this->loadFromYamlCollectionFixture('routes.yml');
        $route = $collection->get('get_users');

        $this->assertEquals('/users.{_format}', $route->getPath());
        $this->assertEquals('json|xml|html', $route->getRequirement('_format'));
    }

    public function testManualRoutesWithoutIncludeFormat()
    {
        $collection = $this->loadFromYamlCollectionFixture('routes.yml', false);
        $route = $collection->get('get_users');

        $this->assertEquals('/users', $route->getPath());
    }

    public function testManualRoutesWithFormats()
    {
        $collection = $this->loadFromYamlCollectionFixture(
            'routes.yml',
            true,
            array(
                'json' => false
            )
        );
        $route = $collection->get('get_users');

        $this->assertEquals('json', $route->getRequirement('_format'));
    }

    public function testManualRoutesWithDefaultFormat()
    {
        $collection = $this->loadFromYamlCollectionFixture(
            'routes.yml',
            true,
            array(
                'json' => false,
                'xml'  => false,
                'html' => true,
            ),
            'xml'
        );
        $route = $collection->get('get_users');

        $this->assertEquals('xml', $route->getDefault('_format'));
    }

    /**
     * Load routes collection from YAML fixture routes under Tests\Fixtures directory.
     *
     * @param string   $fixtureName   name of the class fixture
     * @param boolean  $includeFormat whether or not the requested view format must be included in the route path
     * @param string[] $formats       supported view formats
     * @param string   $defaultFormat default view format
     * @return RouteCollection
     */
    protected function loadFromYamlCollectionFixture(
        $fixtureName,
        $includeFormat = true,
        array $formats = array(
            'json' => false,
            'xml'  => false,
            'html' => true,
        ),
        $defaultFormat = null
    ) {
        $collectionLoader = new RestYamlCollectionLoader(
            new FileLocator(array(__DIR__ . '/../../Fixtures/Routes')),
            new RestRouteProcessor(),
            $includeFormat,
            $formats,
            $defaultFormat
        );
        $controllerLoader = $this->getControllerLoader();

        $resolver = new LoaderResolver(array($collectionLoader, $controllerLoader));

        return $collectionLoader->load($fixtureName, 'rest');
    }
}
