<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 22:16
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use Mango\CoreDomain\Repository\CategoryRepositoryInterface;
use Mango\CoreDomainBundle\Service\CategoryService;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CategoriesController
 *
 * @package Mango\API\RestBundle\Controller
 */
class CategoriesController extends RestController
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    public function init()
    {
        $this->categoryService = $this->get('mango_core_domain.category_service');
    }

    /**
     * @param ParamFetcher $paramFetcher
     */
    public function getCategoriesAction(ParamFetcher $paramFetcher)
    {
        /** @var CategoryRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.category_repository');
        return array(
            'categories' => $repo->findAll()
        );
    }

    public function postCategoriesAction(Request $request)
    {
        $form = $this->categoryService->create($request);

        if ($form->isValid()) {
            echo "CREATED";
            die;
        }

        return $form;
    }

    public function newCategoriesAction(Request $request)
    {
        $form = $this->postCategoriesAction($request);
        return $this->generateNewView($form, 'post_categories');
    }
} 