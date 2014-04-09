<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 15:55
 */

namespace Mango\CoreDomain\Tests\Model;
use Mango\CoreDomain\Model\Application;

/**
 * Class ApplicationTest
 * @package Mango\CoreDomain\Tests\Model
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testApplicationRelated()
    {
        $related = new Application();
        $related->setName("Related");

        $application = new Application();
        $application->setRelatedTo($related);

        $this->assertEquals("Related", $application->getRelatedTo()->getName());
    }
}