<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:56
 */

namespace Mango\CoreDomainBundle\Service;

use Mango\CoreDomain\Repository\ShopproductRepositoryInterface;
use Mango\CoreDomainBundle\Form\ShopproductType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ShopproductService
 *
 * @package Mango\CoreDomainBundle\Service
 */
class ShopproductService extends CoreService
{
    protected $shopproductRepository;

    /**
     * @param ShopproductRepositoryInterface $shopproductRepository
     * @param FormFactoryInterface           $formFactory
     */
    public function __construct(ShopproductRepositoryInterface $shopproductRepository, FormFactoryInterface $formFactory)
    {
        parent::__construct($formFactory);
        $this->shopproductRepository = $shopproductRepository;
    }

    /**
     * Service for creating a shop product.
     *
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $shopproduct = $this->shopproductRepository->createShopproduct();
        $form = $this->processForm(new ShopproductType(), $shopproduct, $request);

        if ($form->isValid()) {
            $this->shopproductRepository->add($shopproduct);
        }

        return $form;
    }
} 