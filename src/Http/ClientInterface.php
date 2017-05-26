<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

interface ClientInterface
{
    /**
     * Make a GET request to a given URI
     *
     * @param  string $uri
     * @param array $headers
     * @return ResponseInterface
     */
    public function get($uri, array $headers = []);

    /**
     * Make a POST request to a given URI and data
     *
     * @param  string $uri
     * @param  mixed $data
     * @param array $headers
     * @return ResponseInterface
     */
    public function post($uri, $data, array $headers = []);
}
