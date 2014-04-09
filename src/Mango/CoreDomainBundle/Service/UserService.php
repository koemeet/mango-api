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
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserService
 * @package Mango\CoreDomainBundle\Service
 */
class UserService
{
    protected $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Find a user by identifier.
     *
     * This can contain the string "@me", which translates to the current logged in user.
     *
     * @param $id
     * @return User
     */
    public function findByIdentifier($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * Add a user.
     *
     * @param Request $request
     * @return \Mango\CoreDomain\Model\User
     */
    public function addUser(Request $request)
    {
        // We create our user
        $user = $this->userRepository->create();

        // Validate it
        return $user;
    }
} 