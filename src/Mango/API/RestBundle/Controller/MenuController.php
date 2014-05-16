<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/05/14
 * Time: 10:08
 */

namespace Mango\API\RestBundle\Controller;
use Mango\CoreDomain\Repository\MenuRepositoryInterface;

/**
 * Class MenuController
 *
 * @package Mango\API\RestBundle\Controller
 */
class MenuController extends RestController
{
    public function getMenusAction()
    {
        /** @var MenuRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.menu_repository');

        return array(
            'menus' => $repo->findAll()
        );
    }
}