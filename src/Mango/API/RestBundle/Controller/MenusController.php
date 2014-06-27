<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/05/14
 * Time: 10:08
 */

namespace Mango\API\RestBundle\Controller;

use Mango\CoreDomain\Repository\MenuRepositoryInterface;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use Mango\CoreDomainBundle\Service\MenuService;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class MenuController
 *
 * @package Mango\API\RestBundle\Controller
 */
class MenusController extends RestController
{
    /**
     * @var MenuRepositoryInterface
     */
    protected $menuRepository;

    /**
     * @var MenuService
     */
    protected $menuService;

//    public function init()
//    {
//        $this->menuRepository = $this->get('mango_core_domain.menu_repository');
//        $this->menuService = $this->get('mango_core_domain.menu_service');
//    }

    public function getMenusAction()
    {
        $menus = $this->get('sylius.repository.menu')->findAll();
        return array(
            'menus' => $menus
        );
    }

    /**
     * Get a single menu node.
     *
     * @ApiDoc(
     *  section = "Menus"
     * )
     * @param $id
     * @return array
     */
    public function getMenuAction($id)
    {
        throw new \RuntimeException("Not implemented.");
        die;
        $menu = $this->menuRepository->find($id);
        return array(
            'menus' => array($menu)
        );
    }

    /**
     * Get nodes of a menu.
     *
     * @ApiDoc(
     *  section = "Menus"
     * )
     * @param $id
     * @throws \RuntimeException
     */
    public function getMenuChildrenAction($id)
    {
        // TODO: Implement
        throw new \RuntimeException("This feature is not implemented yet!");
    }

    /**
     * Add a new menu.
     *
     * @ApiDoc(
     *  section = "Menus",
     *  input = "Mango\CoreDomainBundle\Form\MenuType"
     * )
     * @Post("/menus")
     */
    public function postMenusAction(Request $request)
    {
        return $this->domainService->create('menu', $request->request->all());
    }

    /**
     * Update a menu.
     *
     * @ApiDoc(
     *  section = "Menus",
     *  input = "Mango\CoreDomainBundle\Form\MenuType"
     * )
     * @param string  $id
     * @param Request $request
     * @return \FOS\RestBundle\View\View|void
     */
    public function putMenuAction($id, Request $request)
    {
        $form = $this->menuService->update($id, $request);
        if ($form->isValid()) {
            return $this->createCreatedView($form, 'get_menu');
        }
        return $form;
    }

    /**
     * @Get("/menus/new")
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function newMenusAction(Request $request)
    {
        $form = $this->postMenusAction($request);
        return $this->generateNewView($form, 'post_menus');
    }
}