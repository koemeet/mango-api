<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 29/03/14
 * Time: 17:57
 */

namespace Mango\CoreDomain\Service;

use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\UserRepositoryInterface;

/**
 * Class UserService
 *
 * Provides service methods for managing users. It is independent of a
 * persisting layer, because it uses a UsersRepositoryInterface. Which will
 * provide the necessary logic for retrieving and persisting users. LETS HOSSEL!!!
 *
 * @package Mango\CoreDomain\Service
 */
class UserService
{
    /** @var UserRepositoryInterface */
    protected $repository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @param User $user
     * @param Application[] $applications
     * @return int
     */
    public function calculateSalary(User $user, array $applications)
    {
        // Example code, to be removed...
        $users = $this->repository->findBy(array('email' => $user->getEmail()), 10, 2);

        foreach ($users as $user) {
            return pow(strlen($user->getEmail()), 3) * (count($applications) + 1);
        }
    }
}