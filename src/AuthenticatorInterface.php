<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

interface AuthenticatorInterface
{
    /**
     * Get the authorization code
     *
     * @return string
     */
    public function getAuthorizationCode();
}
