<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/04/14
 * Time: 14:57
 */

namespace Mango\CoreDomain\Tests\Persistence;


use Mango\CoreDomain\Persistence\Query;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultValueQuery()
    {
        $query = Query::create();

        $this->assertEquals(10, $query->getLimit());
        $this->assertEquals(0, $query->getOffset());
    }

    public function testOrderBy()
    {
        $query = Query::create();
        $query->setOrderBy(array('username' => 'ASC'));

        $this->assertArrayHasKey('username', $query->getOrderBy());
        $this->assertCount(1, $query->getOrderBy());

        $query->addOrderBy('field2', 'DESC');

        $this->assertArrayHasKey('field2', $query->getOrderBy());
        $this->assertCount(2, $query->getOrderBy());

        $query->removeOrderBy('username');

        $this->assertArrayNotHasKey('username', $query->getOrderBy());
        $this->assertCount(1, $query->getOrderBy());
    }
} 