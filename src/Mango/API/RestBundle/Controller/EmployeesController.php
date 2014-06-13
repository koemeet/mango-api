<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 12:40
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Util\Codes;
use Mango\CoreDomainBundle\Service\EmployeeService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EmployeesController
 *
 * @package Mango\API\RestBundle\Controller
 */
class EmployeesController extends RestController
{
    /**
     * @var EmployeeService
     */
    protected $employeeService;

    public function init()
    {
        $this->employeeService = $this->get('mango_core_domain.employee_service');
    }

    /**
     * Get employees.
     *
     * @ApiDoc(
     *  section = "Employees"
     * )
     * @param ParamFetcher $paramFetcher
     */
    public function getEmployeesAction(ParamFetcher $paramFetcher)
    {
        // TODO: Implement
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function postEmployeesAction(Request $request)
    {
        $form = $this->employeeService->create($request);
        if ($form->isValid()) {
            return $this->createView($form, Codes::HTTP_CREATED, 'get_employee');
        }
        return $form;
    }

    public function newEmployeesAction(Request $request)
    {
        $form = $this->postEmployeesAction($request);
        return $this->generateNewView($form, 'post_employees');
    }
} 