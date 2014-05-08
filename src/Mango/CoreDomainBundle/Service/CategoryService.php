<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 22:25
 */

namespace Mango\CoreDomainBundle\Service;


use Mango\CoreDomain\Repository\CategoryRepositoryInterface;
use Mango\CoreDomainBundle\Form\CategoryType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class CategoryService extends CoreService
{
    protected $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @param FormFactoryInterface        $formFactory
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, FormFactoryInterface $formFactory)
    {
        parent::__construct($formFactory);
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $category = $this->categoryRepository->createCategory();
        $form = $this->processForm(new CategoryType(), $category, $request);

        if ($form->isValid()) {
            $this->categoryRepository->add($category);
        }

        return $form;
    }
} 