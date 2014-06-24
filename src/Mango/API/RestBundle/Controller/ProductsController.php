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
use FOS\RestBundle\View\View;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Mango\Component\Core\Model\Product;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Steffen Brem <steffenbrem@gmail.com>
 */
class ProductsController extends RestController
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    public function init()
    {
        $this->repository = $this->get('sylius.repository.product');
    }

    /**
     * Retrieve a collection of the latest products.
     *
     * @ApiDoc(
     *  section="Products"
     * )
     * @return array
     */
    public function getProductsAction()
    {
        $products = $this->repository->findLatest();

        return array(
            'products' => $products
        );
    }

    // TODO: Test case, remove this when appropriate solution
    public function postProductsAction(Request $request)
    {
        $resource = $this->repository->createNew();
        $form = $this->createForm($this->get('sylius.form.type.product'), $resource);

        if ($form->handleRequest($request)->isValid()) {
            $manager = $this->get('sylius.manager.product');
            $manager->persist($resource);
            $manager->flush();

            if (null === $resource) {
                throw new \RuntimeException("Could not create product!");
            }

            return $this->routeRedirectView('get_products');
        }

        return View::create($form);
    }

    public function getProductsNewAction()
    {
        /** @var Product $product */
        $product = $this->repository->createNew();
        $form = $this->createForm($this->get('sylius.form.type.product'), $product);

        return $this->generateNewView($form, 'get_products');
    }
} 