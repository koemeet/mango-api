<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 15:02
 */

namespace Mango\API\RestBundle\Controller;
use FOS\RestBundle\Request\ParamFetcher;
use Mango\CoreDomain\Repository\ProductRepositoryInterface;
use Mango\CoreDomainBundle\Service\ProductService;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductsController
 *
 * @package Mango\API\RestBundle\Controller
 */
class ProductsController extends RestController
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ProductService
     */
    protected $productService;

    public function init()
    {
        $this->productRepository = $this->get('mango_core_domain.product_repository');
        $this->productService = $this->get('mango_core_domain.product_service');
    }

    /**
     * @param ParamFetcher $paramFetcher
     * @return mixed
     */
    public function getProductsAction(ParamFetcher $paramFetcher)
    {
        return array(
            'products' => $this->productRepository->findAll()
        );
    }

    public function postProductsAction(Request $request)
    {
        $form = $this->productService->create($request);

        if ($form->isValid()) {
            return array("success" => "JAA!!!");
        }

        return $form;
    }

    public function newProductsAction(Request $request)
    {
        $form = $this->postProductsAction($request);
        return $this->generateNewView($form, 'post_products');
    }
}