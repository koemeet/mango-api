<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 16:24
 */

namespace Mango\CoreDomain\Model;

/**
 * Class StoreProduct
 *
 * @package Mango\CoreDomain\Model
 */
class StoreProduct extends Product
{
    /**
     * @var Workspace
     */
    protected $workspace;

    /**
     * @param Workspace $workspace
     */
    public function setWorkspace(Workspace $workspace)
    {
        $this->workspace = $workspace;
    }

    /**
     * @return Workspace
     */
    public function getWorkspace()
    {
        return $this->workspace;
    }
} 