<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2013 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Symfony\Cmf\Bundle\BlockBundle\Tests\WebTest\Admin;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;

/**
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class ContainerBlockAdminTest extends AbstractBlockAdminTestCase
{
    /**
     * {@inheritdoc}
     */
    public function testBlockList()
    {
        $this->makeListAssertions(
            '/admin/cmf/block/containerblock/list',
            array('container-block-1', 'container-block-2')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockEdit()
    {
        $this->makeEditAssertions(
            '/admin/cmf/block/containerblock/test/blocks/container-block-1/edit',
            array('container-block-1')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockCreate()
    {
        $this->makeCreateAssertions(
            '/admin/cmf/block/containerblock/create',
            array(
                'parentDocument' => '/test/blocks',
                'name'           => 'foo-test-container'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockDelete()
    {
        $this->makeDeleteAssertions('/admin/cmf/block/containerblock/test/blocks/container-block-1/delete');
    }

    /**
     * {@inheritdoc}
     */
    public function testBlockShow()
    {
        $this->makeShowAssertions(
            '/admin/cmf/block/containerblock/test/blocks/container-block-1/show',
            array('container-block-1')
        );
    }
}
