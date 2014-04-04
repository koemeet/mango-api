<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 20:43
 */

namespace Mango\CoreDomain\Tests\Model;
use Mango\CoreDomain\Model\User;

/**
 * Class UserTest
 * @package Mango\CoreDomain\Tests\Model
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testSlugify()
    {
        $user = new User();
        $this->assertEquals("ikbensteffen", $user->slugify("IkBenSteffen"));
    }
} 