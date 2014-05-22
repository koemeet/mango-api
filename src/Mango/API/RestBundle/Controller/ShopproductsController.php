<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:20
 */

namespace Mango\API\RestBundle\Controller;
use FOS\RestBundle\Util\Codes;
use Mango\CoreDomain\Model\ShopProduct;
use Mango\CoreDomain\Repository\ShopproductRepositoryInterface;
use Mango\CoreDomainBundle\Service\ShopproductService;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class ShopProductsController
 *
 * @package Mango\API\RestBundle\Controller
 */
class ShopproductsController extends RestController
{
    /**
     * @var ShopproductRepositoryInterface
     */
    protected $shopproductRepository;

    /**
     * @var ShopproductService
     */
    protected $shopproductService;

    public function init()
    {
        $this->shopproductRepository = $this->get('mango_core_domain.shopproduct_repository');
        $this->shopproductService = $this->get('mango_core_domain.shopproduct_service');
    }

    /**
     * Get all webshop products.
     *
     * NOTE: These products inherit from <code>product</code>, only they contain more info about meta data etc.
     *
     * @ApiDoc(
     *  section = "Webshops"
     * )
     * @return mixed
     */
    public function getShopproductsAction()
    {
        return array(
            'shopproducts' => $this->shopproductRepository->findAll()
        );
    }

    /**
     * Get a single shop product.
     *
     * @ApiDoc(
     *  section = "Webshops"
     * )
     * @param $id
     * @return array
     */
    public function getShopproductAction($id)
    {
        /** @var ShopProduct $product */
        $product = $this->shopproductRepository->find($id);
        return array(
            'shopproduct' => $product
        );
    }

    public function getShopproductFavoritesAction($id)
    {

    }

    /**
     * Add a new shop product to an application.
     *
     * @ApiDoc(
     *  section = "Webshops",
     *  input = "Mango\CoreDomainBundle\Form\ShopproductType"
     * )
     * @param Request $request
     * @return mixed
     */
    public function postShopproductsAction(Request $request)
    {
        $form = $this->shopproductService->create($request);

        if ($form->isValid()) {
            return $this->createView($form, Codes::HTTP_CREATED, 'get_shopproduct');
        }

        return $form;
    }

    /**
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function newShopproductsAction(Request $request)
    {
        $form = $this->postShopproductsAction($request);
        return $this->generateNewView($form, 'post_shopproducts');
    }
} 