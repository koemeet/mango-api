<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 17:04
 */

namespace Mango\CoreDomainBundle\Service;

use FOS\RestBundle\View\View;
use Mango\API\RestBundle\Document\Page;
use Mango\CoreDomain\DataTransformer\DTO\PageDTO;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Form\PageType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class PageService
 * @package Mango\CoreDomainBundle\Service
 */
class PageService extends CoreService
{
    protected $pageRepository;
    protected $applicationRepository;
    protected $router;

    /**
     * Constructor.
     *
     * @param PageRepositoryInterface $pageRepository
     * @param ApplicationRepositoryInterface $applicationRepository
     * @param FormFactoryInterface $formFactory
     * @param \Symfony\Component\Routing\RouterInterface $router
     */
    public function __construct(PageRepositoryInterface $pageRepository, ApplicationRepositoryInterface $applicationRepository, RouterInterface $router, FormFactoryInterface $formFactory)
    {
        $this->pageRepository = $pageRepository;
        $this->applicationRepository = $applicationRepository;
        $this->router = $router;

        parent::__construct($formFactory);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $page = $this->pageRepository->createPage();
        $form = $this->processForm(new PageType(), $page, $request);

        if ($form->isValid()) {
            $this->pageRepository->add($page);
        }

        return $form;
    }

    /**
     * Update page object.
     *
     * @param $id
     * @param Request $request
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return \Symfony\Component\Form\FormInterface
     */
    public function update($id, Request $request)
    {
        $page = $this->pageRepository->find($id);

        if (!$page) {
            throw new ResourceNotFoundException(sprintf("Could not find page with the id: %s", $id));
        }

        $form = $this->processForm(new PageType(), $page, $request);

        if ($form->isValid()) {
            $this->pageRepository->update($page);
        }

        return $form;
    }

    /**
     * @param Query $query
     * @return array
     */
    public function find(Query $query)
    {
        return $this->pageRepository->findByQuery($query);
    }
}