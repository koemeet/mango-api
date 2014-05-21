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

    public function init()
    {
        $this->menuRepository = $this->get('mango_core_domain.menu_repository');
        $this->menuService = $this->get('mango_core_domain.menu_service');
    }

    public function getMenusAction()
    {
        /** @var MenuRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.menu_repository');

        return array(
            'menus' => $repo->findAll()
        );
    }

    public function getMenuAction($id)
    {

    }

    public function getMenuChildrenAction($id)
    {

    }

    /**
     * @Post("/menus")
     */
    public function postMenusAction(Request $request)
    {
        $form = $this->menuService->create($request);
        if ($form->isValid()) {
            echo "Yey";
            die;
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