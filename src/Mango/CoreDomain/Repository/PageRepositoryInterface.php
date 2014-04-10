<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 16:57
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Model\Page;

/**
 * Interface PageRepositoryInterface
 * @package Mango\CoreDomain\Repository
 */
interface PageRepositoryInterface extends GenericRepositoryInterface
{

    /**
     * Create a page instance.
     *
     * @return Page
     */
    public function createPage();

    /**
     * Add page.
     *
     * @param $page
     * @return mixed
     */
    public function add($page);
}