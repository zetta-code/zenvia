<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

/**
 * ResponseInterface wrapper for a PSR-7 response.
 */
class Psr7ResponseDecorator implements HeaderAwareResponseInterface
{
    /**
     * @var Psr7ResponseInterface
     */
    private $decoratedResponse;

    /**
     * @param Psr7ResponseInterface $response
     */
    public function __construct(Psr7ResponseInterface $response)
    {
        $this->decoratedResponse = $response;
    }

    /**
     * Return the original PSR-7 response being decorated.
     *
     * @return Psr7ResponseInterface
     */
    public function getDecoratedResponse()
    {
        return $this->decoratedResponse;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusCode()
    {
        return $this->decoratedResponse->getStatusCode();
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusDescription()
    {
        return $this->decoratedResponse->getReasonPhrase();
    }


    /**
     * {@inheritDoc}
     */
    public function getBody()
    {
        return (string) $this->decoratedResponse->getBody();
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaderLine($name, $default = null)
    {
        if (! $this->decoratedResponse->hasHeader($name)) {
            return $default;
        }
        return $this->decoratedResponse->getHeaderLine($name);
    }
}
