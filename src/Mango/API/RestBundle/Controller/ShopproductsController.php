<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:20
 */

namespace Mango\API\RestBundle\Controller;
use FOS\RestBundle\Util\Codes;
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
     * @ApiDoc(
     *  section = "Shop"
     * )
     * @return mixed
     */
    public function getShopproductsAction()
    {
        return $this->shopproductRepository->findAll();
    }

    /**
     * Get a single shop product.
     *
     * @ApiDoc(
     *  section = "Shop"
     * )
     * @param $id
     * @return array
     */
    public function getShopproductAction($id)
    {
        return array(
            'shopproduct' => $this->shopproductRepository->find($id)
        );
    }

    public function getShopproductFavoritesAction($id)
    {

    }

    /**
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