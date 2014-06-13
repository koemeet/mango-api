<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 07/05/14
 * Time: 12:43
 */

namespace Mango\API\RestBundle\Controller;
use FOS\RestBundle\Request\ParamFetcher;
use Mango\CoreDomain\Repository\ModuleRepositoryInterface;

use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class ModulesController
 * @package Mango\API\RestBundle\Controller
 */
class ModulesController extends RestController
{
    /**
     * Retrieve applications in the widest scope possible. You will most probably never use this.
     *
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="count", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Modules",
     *  description="Retrieve applications in the widest scope possible."
     * )
     */
    public function getModulesAction(ParamFetcher $paramFetcher)
    {
        /** @var ModuleRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.module_repository');

        return array(
            'modules' => $repo->findByQuery($this->extract($paramFetcher))
        );
    }

    public function getModuleAction($id)
    {
        /** @var ModuleRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.module_repository');

        return array(
            'modules' => array($repo->find($id))
        );
    }
} 