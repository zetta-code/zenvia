<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

interface ResponseInterface
{
    /**
     * Retrieve the HTTP response status code
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Get HTTP status message
     *
     * @return string
     */
    public function getStatusDescription();

    /**
     * Retrieve the response body
     *
     * @return string
     */
    public function getBody();
}
