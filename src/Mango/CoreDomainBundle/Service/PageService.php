<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 17:04
 */

namespace Mango\CoreDomainBundle\Service;
use Mango\API\RestBundle\Document\Page;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Form\PageType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PageService
 * @package Mango\CoreDomainBundle\Service
 */
class PageService extends CoreService
{
    protected $pageRepository;
    protected $formFactory;

    /**
     * Constructor.
     *
     * @param PageRepositoryInterface $pageRepository
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     */
    public function __construct(PageRepositoryInterface $pageRepository, FormFactoryInterface $formFactory)
    {
        $this->pageRepository = $pageRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * Create zo 1 ding.
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $page = $this->pageRepository->createPage();
        $form = $this->validate(new PageType(), $page, $request);

        if ($form->isValid()) {
            $this->pageRepository->add($page);
        }

        return $form;
    }
}