<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 15:17
 */

namespace Mango\CoreDomainBundle\Service;

use Mango\CoreDomain\Repository\ProductRepositoryInterface;
use Mango\CoreDomainBundle\Form\ProductType;
use Mango\CoreDomainBundle\Form\StoreProductType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductService
 *
 * @package Mango\CoreDomainBundle\Service
 */
class ProductService extends CoreService
{
    protected $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param FormFactoryInterface       $formFactory
     */
    public function __construct(ProductRepositoryInterface $productRepository, FormFactoryInterface $formFactory)
    {
        parent::__construct($formFactory);
        $this->productRepository = $productRepository;
    }

    /**
     * Create new product.
     *
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $product = $this->productRepository->createProduct();
        $form = $this->processForm(new StoreProductType(), $product, $request);

        if ($form->isValid()) {
            $this->productRepository->add($product);
        }

        return $form;
    }
} 