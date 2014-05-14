<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 12:41
 */

namespace Mango\CoreDomainBundle\Service;

use Mango\CoreDomain\Repository\EmployeeRepositoryInterface;
use Mango\CoreDomainBundle\Form\EmployeeType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EmployeeService
 *
 * @package Mango\CoreDomainBundle\Service
 */
class EmployeeService extends CoreService
{
    /**
     * @var EmployeeRepositoryInterface
     */
    protected $employeeRepository;

    /**
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param FormFactoryInterface        $formFactory
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository, FormFactoryInterface $formFactory)
    {
        parent::__construct($formFactory);
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $employee = $this->employeeRepository->createEmployee();
        $form = $this->processForm(new EmployeeType(), $employee, $request);

        if ($form->isValid()) {
            $this->employeeRepository->add($employee);
        }

        return $form;
    }
}