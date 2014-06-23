<?php
/*
 * This file is part of the Mango package.
 *
 * (c) Steffen Brem <steffenbrem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Product\Model\Product;
use Sylius\Component\Product\Model\Variant;

/**
 * @author Steffen Brem <steffenbrem@gmail.com>
 */
class ProductsController extends FOSRestController
{
    public function getProductsAction()
    {
        // Nice, this works correctly :)
        $repo = $this->get('sylius.repository.product');

        /** @var ProductInterface $product */
        $product = $repo->find(1);

        // TODO: $repo->findByApplication($application); We can find products that belong to a certain application

        return $product;
    }
} 