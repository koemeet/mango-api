<?php
/*
 * This file is part of the Mango package.
 *
 * (c) Steffen Brem <steffenbrem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Mango\Bundle\CoreBundle\Kernel;

/**
 * @author Steffen Brem <steffenbrem@gmail.com>
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new \Nelmio\ApiDocBundle\NelmioApiDocBundle(),
            new \Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            new \Mango\API\RestBundle\MangoAPIRestBundle()
        );

        return array_merge(parent::registerBundles(), $bundles);
    }
} 