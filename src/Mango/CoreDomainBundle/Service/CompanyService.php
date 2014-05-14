<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 10:58
 */

namespace Mango\CoreDomainBundle\Service;
use Mango\CoreDomain\Repository\CompanyRepositoryInterface;
use Mango\CoreDomainBundle\Form\CompanyType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompanyService
 *
 * @package Mango\CoreDomainBundle\Service
 */
class CompanyService extends CoreService
{
    /**
     * @var CompanyRepositoryInterface
     */
    protected $companyRepository;

    /**
     * @param CompanyRepositoryInterface $companyRepository
     * @param FormFactoryInterface       $formFactory
     */
    public function __construct(CompanyRepositoryInterface $companyRepository, FormFactoryInterface $formFactory)
    {
        parent::__construct($formFactory);
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function create(Request $request)
    {
        $company = $this->companyRepository->createCompany();
        $form = $this->processForm(new CompanyType(), $company, $request);

        if ($form->isValid()) {
            $this->companyRepository->add($company);
        }

        return $form;
    }
}