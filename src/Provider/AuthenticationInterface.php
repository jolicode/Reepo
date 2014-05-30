<?php

namespace Joli\Reepo\Provider;

use Joli\Reepo\Repository\Repository;

/**
 * Add authentication feature to a provider
 *
 * This is useful for provider which require authentication, like a ssh key for github or other git providers
 */
interface AuthenticationInterface
{
    /**
     * Register authentication to the provider
     *
     * @param Repository $repository Repository to register
     */
    public function registerAuthentication(Repository $repository);
}