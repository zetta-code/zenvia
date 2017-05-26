<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

class Authenticator implements AuthenticatorInterface
{
    /**
     * User
     *
     * @var string
     */
    private $user;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Authenticator constructor
     * @param string $user
     * @param string $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Get the authenticator user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the authenticator user
     *
     * @param string $user
     * @return Authenticator
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the authenticator password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the authenticator password
     *
     * @param string $password
     * @return Authenticator
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationCode()
    {
        return base64_encode($this->user . ':' . $this->password);
    }
}
