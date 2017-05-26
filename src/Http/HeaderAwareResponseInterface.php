<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

interface HeaderAwareResponseInterface extends ResponseInterface
{
    /**
     * Retrieve a header (as a single line) from the response.
     *
     * Header name lookups MUST be case insensitive.
     *
     * Since the only header values the feed reader consumes are singular
     * in nature, this method is expected to return a string, and not
     * an array of values.
     *
     * @param string $name Header name to retrieve.
     * @param mixed $default Default value to use if header is not present.
     * @return string
     */
    public function getHeaderLine($name, $default = null);
}
