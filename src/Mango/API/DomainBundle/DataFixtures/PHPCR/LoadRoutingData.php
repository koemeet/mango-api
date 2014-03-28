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
use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\Tests\Models\CMS\CmsPage;
use Mango\API\RestBundle\Document\Page;
use Symfony\Cmf\Bundle\ContentBundle\Doctrine\Phpcr\StaticContent;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;

/**
 * Class LoadRoutingData
 * @package Mango\API\DomainBundle\DataFixtures
 */
class LoadRoutingData implements FixtureInterface
{
    /**
     * @param DocumentManager $manager
     */
    function load(ObjectManager $manager)
    {
//        $route = new Route();
//        $route->setName("test-1");
//        $route->setParent($manager->find(null, '/cms/routes'));
//        $manager->persist($route);


//        $content = new StaticContent();
//        $content->setName("Our Team");
//        $content->setTitle("Our Team!");
//        $content->setParent($manager->find(null, '/cms/content'));
//        $content->setBody("<h1>Yes toch</h1><p>This is our team baby!</p>");
//
//        $manager->persist($content);

//        $page = new Page();
//        $page->setTitle("Ik ben een page G");
//        $page->setBody("Ik ben die body <p>eej</p>");
//        $page->setName("Verzin zelf iets leuks...");
//        $page->setParent($manager->find(null, '/cms/pages'));
//        $manager->persist($page);

        $page = new Page();
        $page->setTitle("aasdasdasddasd");
        $page->setCrackEten(true);
        $page->setBody("Ik ben die22 sdsadsd body <p>asdasda1231 123d asdasdeej</p>");
        $page->setName("zo 1 pagina 2");
        $page->setParent($manager->find(null, '/cms/pages'));
        $manager->persist($page);
//
//        $route->setContent($page);

        $manager->flush();
    }
}