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
    /**
     * Tests that if you set the alias, it returns an Application instance
     */
    public function testApplicationAlias()
    {
        $application = new Application();
        $application->setAlias(new Application());
        $this->assertInstanceOf('Mango\CoreDomain\Model\Application', $application->getAlias());
    }
}