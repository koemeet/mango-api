<?php
/**
 * Created by PhpStorm.
 * User: Robinskoe
 * Date: 09/04/14
 * Time: 16:09
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandlerInterface;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\ParamQueryExtractor;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;
use FOS\RestBundle\Controller\Annotations as Rest;
use Mango\API\RestBundle\Request\ParamFetcher\QueryExtractor;
use Mango\CoreDomain\Model\Company;
use Mango\CoreDomain\Repository\CompanyRepositoryInterface;
//use Mango\CoreDomainBundle\Form\CompanyType;
use Mango\CoreDomain\Repository\EmployeeRepositoryInterface;
use Mango\CoreDomainBundle\Form\UserType;
use Mango\CoreDomainBundle\Service\CompanyService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class CompaniesController
 * @package Mango\API\RestBundle\Controller
 */
class CompaniesController extends RestController
{
    /**
     * @var CompanyRepositoryInterface
     */
    protected $companyRepository;

    /**
     * @var CompanyService
     */
    protected $companyService;

    public function init()
    {
        $this->companyRepository = $this->get('mango_core_domain.company_repository');
        $this->companyService = $this->get('mango_core_domain.company_service');
    }

    /**
     * Retrieve all companies.
     *
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="count", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Companies"
     * )
     *
     * @param ParamFetcherInterface $paramFetcher
     * @return array
     */
    public function getCompaniesAction(ParamFetcherInterface $paramFetcher)
    {
        $query = $this->queryExtractor->extract($paramFetcher);
        return array('companies' => $this->companyRepository->findByQuery($query));
    }

    /**
     * Get a single company
     *
     * @ApiDoc(
     *  section="Companies"
     * )
     */
    public function getCompanyAction($id)
    {
        return array('company' => $this->companyRepository->find($id));
    }

    /**
     * Get the pages for a specific company
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     */
    public function getCompanyPagesAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.phpcr_action_handler');
        return $handler->find('Mango\\API\\RestBundle\\Document\\Page', $paramFetcher);
    }

    /**
     * Get all employees of a company.
     *
     * @ApiDoc(
     *  section = "Companies"
     * )
     * @param $id
     * @return array
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public function getCompanyEmployeesAction($id)
    {
        $company = $this->companyRepository->find($id);

        if (!$company) {
            throw new ResourceNotFoundException(sprintf('Company with id "%s" could not be found.', $id));
        }

        /** @var EmployeeRepositoryInterface $repo */
        $repo = $this->get('mango_core_domain.employee_repository');
        $employees = $repo->findByCompany($company);

        return array('employees' => $employees);
    }

    /**
     * Create new company.
     *
     * @ApiDoc(
     *  section = "Companies"
     * )
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function postCompaniesAction(Request $request)
    {
        $form = $this->companyService->create($request);
        if ($form->isValid()) {
            $this->createView($form, Codes::HTTP_CREATED, 'get_company');
        }
        return $form;
    }
}