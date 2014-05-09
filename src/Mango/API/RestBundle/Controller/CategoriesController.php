<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 22:16
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Util\Codes;
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

    public function getCategoryAction($id)
    {
        /** @var CategoryRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.category_repository');
        return array(
            'category' => $repo->find($id)
        );
    }

    public function postCategoriesAction(Request $request)
    {
        $form = $this->categoryService->create($request);

        if ($form->isValid()) {
            return $this->createView($form, Codes::HTTP_CREATED, 'get_category');
        }

        return $form;
    }

    public function newCategoriesAction(Request $request)
    {
        $form = $this->postCategoriesAction($request);
        return $this->generateNewView($form, 'post_categories');
    }
} 