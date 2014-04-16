<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 17:04
 */

namespace Mango\CoreDomainBundle\Service;
use Mango\API\RestBundle\Document\Page;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
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
    protected $applicationRepository;
    protected $formFactory;

    /**
     * Constructor.
     *
     * @param PageRepositoryInterface $pageRepository
     * @param ApplicationRepositoryInterface $applicationRepository
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(PageRepositoryInterface $pageRepository, ApplicationRepositoryInterface $applicationRepository, FormFactoryInterface $formFactory)
    {
        $this->pageRepository = $pageRepository;
        $this->applicationRepository = $applicationRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * Try to create a new page by application
     *
     * @param \Mango\CoreDomain\Model\Application $application
     * @param Request $request
     * @return mixed
     */
    public function createByApplication(Application $application, Request $request)
    {
        $page = $this->pageRepository->createPage();
        $form = $this->processForm(new PageType(), $page, $request);

        if ($form->isValid()) {
            $this->pageRepository->add($application, $page);
        }

        return $form;
    }

    /**
     * Create page by application id and request.
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function createByApplicationId($id, Request $request)
    {
        $application = $this->applicationRepository->find($id);
        return $this->createByApplication($application, $request);
    }
}