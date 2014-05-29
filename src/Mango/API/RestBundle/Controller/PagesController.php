<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:42
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Form\PageType;
use Mango\CoreDomainBundle\Service\PageService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class PagesController
 * @package Mango\API\RestBundle\Controller
 */
class PagesController extends RestController
{
    /**
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * @var PageService
     */
    protected $pageService;

    public function init()
    {
        $this->pageRepository = $this->get('mango_core_domain.page_repository');
        $this->pageService = $this->get('mango_core_domain.page_service');
    }

//    /**
//     * @param ResultFetcherInterface $resultFetcher
//     */
//    public function getPagesAction(ResultFetcherInterface $resultFetcher)
//    {
//        /** @var ResultFetcherInterface $resultFetcher */
//        $resultFetcher = $this->get('mango_api_rest.phpcr.result_fetcher');
//
//        $query = new Query();
//        $root = '/cms/applications/1';
//
//        // Find all pages for this application
//        $resultFetcher->find($root . '/pages', $query);
//    }

    public function getPagesAction()
    {
        return $this->pageRepository->findAll();
    }

    /**
     * Retrieve a single page by its identifier.
     *
     * @ApiDoc(
     *  section = "Pages"
     * )
     * @param $id
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function getPageAction($id, Request $request)
    {
        return array('page' => $this->pageRepository->find($id));
    }

    /**
     * Create a new page.
     *
     * @ApiDoc(
     *  section = "Pages"
     * )
     */
    public function postPagesAction(Request $request)
    {
        $form = $this->pageService->create($request);
        if ($form->isValid()) {
            return $this->createView($form, 201, 'get_page');
        }
        return $form;
    }

    /**
     * Update an existing page.
     *
     * @ApiDoc(
     *  section = "Pages"
     * )
     * @param $id
     * @param Request $request
     * @return View|\Symfony\Component\Form\FormInterface
     */
    public function putPageAction($id, Request $request)
    {
        $form = $this->pageService->update($id, $request);
        if ($form->isValid()) {
            return $this->createView($form, 200);
        }
        return $form;
    }

    /**
     * Delete a page.
     *
     * @ApiDoc(
     *  section = "Pages"
     * )
     * @param $id
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return \FOS\RestBundle\View\View
     */
    public function deletePageAction($id)
    {
        $page = $this->pageRepository->find($id);
        if (!$page) {
            throw new ResourceNotFoundException(sprintf('Could not find page with id "%s"', $id));
        }
        $this->pageRepository->delete($page);
        return View::create(null, Codes::HTTP_NO_CONTENT);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function newPagesAction(Request $request)
    {
        return $this->generateNewView($this->postPagesAction($request), 'post_pages');
    }
}