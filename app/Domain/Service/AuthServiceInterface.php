<?php

namespace app\Domain\Service;

use app\Domain\Model\User;

/**
 * Interface AuthServiceInterface.
 */
interface AuthServiceInterface
{
    /**
     * @param User $user
     *
     * @return bool
     */
    public function authUser(User $user);
}