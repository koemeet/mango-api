<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 04/04/14
 * Time: 20:47
 */

namespace Mango\CoreDomainBundle\Service;

use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\UserRepositoryInterface;
use Mango\CoreDomainBundle\Form\UserType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class UserService
 * @package Mango\CoreDomainBundle\Service
 */
class UserService extends CoreService
{
    protected $userRepository;
    protected $securityContext;

    /**
     * @param UserRepositoryInterface   $userRepository
     * @param SecurityContextInterface  $securityContext
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(UserRepositoryInterface $userRepository, SecurityContextInterface $securityContext, FormFactoryInterface $formFactory)
    {
        $this->userRepository = $userRepository;
        $this->securityContext = $securityContext;

        parent::__construct($formFactory);
    }

    /**
     * Find a user by identifier.
     *
     * This can contain the string "@me", which translates to the current logged in user.
     *
     * @param $id
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return User
     */
    public function findByIdentifier($id)
    {
        if ($id == '@me') {
            if (!$this->securityContext->getToken()->getUser() instanceof User) {
                throw new HttpException(401, "You are not authorized, please authorize yourself before using the '@me' parameter.");
            }

            return $this->securityContext->getToken()->getUser();
        }

        return $this->userRepository->find($id);
    }

    /**
     * Add a user.
     *
     * @param Request $request
     * @return FormInterface
     */
    public function add(Request $request)
    {
        $user = $this->userRepository->createUser();
        $form = $this->processForm(new UserType(), $user, $request);

        if ($form->isValid()) {
            $this->userRepository->add($user);
        }

        return $form;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    public function update($id, Request $request)
    {
        $user = $this->findByIdentifier($id);
        $form = $this->processForm(new UserType(), $user, $request);

        if ($form->isValid()) {
            $this->userRepository->update($user);
        }

        return $form;
    }
} 