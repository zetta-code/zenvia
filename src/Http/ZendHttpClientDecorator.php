<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zend\Http\Client as ZendHttpClient;
use Zend\Http\Headers;
use Zetta\Zenvia\Exception;

class ZendHttpClientDecorator implements ClientInterface
{
    /**
     * @var ZendHttpClient
     */
    protected $client;

    /**
     * @param ZendHttpClient $client
     */
    public function __construct(ZendHttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return ZendHttpClient
     */
    public function getDecoratedClient()
    {
        return $this->client;
    }

    /**
     * {@inheritDoc}
     */
    public function get($uri, array $headers = [])
    {
        $this->client->resetParameters();
        $this->client->setMethod('GET');
        $this->client->setHeaders(new Headers());
        $this->client->setUri($uri);
        if (! empty($headers)) {
            $this->injectHeaders($headers);
        }
        $response = $this->client->send();


        return new Response(
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->getBody(),
            $this->prepareResponseHeaders($response->getHeaders())
        );
    }

    /**
     * @inheritdoc
     */
    public function post($uri, $data, array $headers = [])
    {
        $this->client->resetParameters();
        $this->client->setMethod('POST');
        $this->client->setHeaders(new Headers());
        $this->client->setUri($uri);
        if (is_array($data)) {
            $this->client->setRawBody(json_encode($data));
        } else {
            $this->client->setRawBody($data);
        }
        if (! empty($headers)) {
            $this->injectHeaders($headers);
        }

        $response = $this->client->send();

        return new Response(
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->getBody(),
            $this->prepareResponseHeaders($response->getHeaders())
        );
    }

    /**
     * Inject header values into the client.
     *
     * @param array $headerValues
     */
    protected function injectHeaders(array $headerValues)
    {
        $headers = $this->client->getRequest()->getHeaders();
        foreach ($headerValues as $name => $values) {
            if (! is_string($name) || is_numeric($name) || empty($name)) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Header names provided to %s::get must be non-empty, non-numeric strings; received %s',
                    __CLASS__,
                    $name
                ));
            }

            if (is_string($values)) {
                $headers->addHeaderLine($name, $values);
                continue;
            }

            if (! is_array($values)) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Header values provided to %s::get must be arrays of values; received %s',
                    __CLASS__,
                    (is_object($values) ? get_class($values) : gettype($values))
                ));
            }

            foreach ($values as $value) {
                if (! is_string($value) && ! is_numeric($value)) {
                    throw new Exception\InvalidArgumentException(sprintf(
                        'Individual header values provided to %s::get must be strings or numbers; '
                        . 'received %s for header %s',
                        __CLASS__,
                        (is_object($value) ? get_class($value) : gettype($value)),
                        $name
                    ));
                }

                $headers->addHeaderLine($name, $value);
            }
        }
    }

    /**
     * Normalize headers to use with HeaderAwareResponseInterface.
     *
     * Ensures multi-value headers are represented as a single string, via
     * comma concatenation.
     *
     * @param Headers $headers
     * @return array
     */
    protected function prepareResponseHeaders(Headers $headers)
    {
        $normalized = [];
        foreach ($headers->toArray() as $name => $value) {
            $normalized[$name] = is_array($value) ? implode(', ', $value) : $value;
        }
        return $normalized;
    }
}
