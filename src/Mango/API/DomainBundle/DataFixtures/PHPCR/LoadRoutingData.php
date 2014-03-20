<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 19/03/14
 * Time: 16:01
 */

namespace Mango\API\DomainBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Tests\Models\CMS\CmsPage;
use Symfony\Cmf\Bundle\ContentBundle\Doctrine\Phpcr\StaticContent;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;

/**
 * Class LoadRoutingData
 * @package Mango\API\DomainBundle\DataFixtures
 */
class LoadRoutingData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $route = new Route();
        $route->setName("team");
        $route->setParent($manager->find(null, '/cms/routes'));

        $manager->persist($route);

        $content = new StaticContent();
        $content->setName("Our Team");
        $content->setTitle("Our Team!");
        $content->setParent($manager->find(null, '/cms/content'));
        $content->setBody("<h1>Yes toch</h1><p>This is our team baby!</p>");

        $manager->persist($content);

        $route->setContent($content);

        $manager->flush();
    }
}