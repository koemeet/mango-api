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
use Mango\Bundle\CoreBundle\Document\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class PagesController
 * @package Mango\API\RestBundle\Controller
 */
class PagesController extends RestController
{
    public function getPagesAction()
    {
        $repository = $this->get('sylius.repository.page');
        return array('pages' => $repository->findAll());
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
        return $this->domainService->create('page', $request->request->all());
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
        $service = new DomainService();
        $service->setContainer($this->container);

        $form = $service->getForm('page');

        $view = View::create(array('form' => $form->createView(), 'route' => 'get_page'));
        $view->setFormat('html');
        $view->setTemplate('MangoAPIRestBundle::new.html.twig');

        return $view;
        return $this->generateNewView($this->postPagesAction($request), 'post_pages');
    }
}