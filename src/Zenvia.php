<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zetta\Zenvia\Contract\SmsInterface;
use Zetta\Zenvia\Contract\SmsReceivedResponseInterface;
use Zetta\Zenvia\Contract\SmsResponseInterface;
use Zetta\Zenvia\Contract\SmsStatusResponseInterface;
use Zetta\Zenvia\Contract\ZenviaInterface;
use Zetta\Zenvia\Exception\RuntimeException;
use Zetta\Zenvia\Http\SmsReceivedResponse;
use Zetta\Zenvia\Http\SmsResponse;
use Zetta\Zenvia\Http\SmsStatusResponse;

class Zenvia implements ZenviaInterface
{
    private const BASE_URI = 'https://api-rest.zenvia.com';

    /**
     * @var Client
     */
    protected $client;

    protected string $account = '';

    protected string $password = '';

    /**
     * Web service URL
     *
     * @var string
     */
    protected $baseUri;

    /**
     * Zenvia constructor.
     *
     * @param string $account
     * @param string $password
     * @param string|null $baseUri
     */
    public function __construct(string $account, string $password, ?string $baseUri = null)
    {
        $this->account = $account;
        $this->password = $password;
        $this->baseUri = $baseUri ?? self::BASE_URI;
    }

    /**
     * Get the Zenvia client.
     *
     * @return Client
     */
    public function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = new Client([
                'base_uri' => $this->baseUri,
            ]);
        }
        return $this->client;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param SmsInterface|array|null $message
     * @param string|null $aggregateId
     *
     * @return Contract\SmsReceivedResponseInterface|SmsResponseInterface|SmsResponseInterface[]|Contract\SmsStatusResponseInterface|SmsReceivedResponse|SmsResponse|SmsStatusResponse|mixed|null
     * @throws GuzzleException
     */
    public function request(string $method, string $uri, $message = null, ?string $aggregateId = null)
    {
        $options = [
            'auth' => [$this->account, $this->password],
            'headers' => $this->getBaseHeaders($method),
        ];
        if (in_array($method, ['POST', 'PUT']) && ! empty($message)) {
            $options['body'] = Util::stringify($message, $aggregateId);
        }

        $response = $this->getClient()->request($method, $uri, $options);
        $this->checkResponse($response, $uri);

        return Util::toSmsResponse($response);
    }

    public function send(SmsInterface $message, ?string $aggregateId = null): SmsResponseInterface
    {
        $uri = '/services/send-sms';
        return $this->request('POST', $uri, $message, $aggregateId);
    }

    public function sendMultiple(array $messages, ?string $aggregateId = null): array
    {
        $uri = '/services/send-sms-multiple';
        return $this->request('POST', $uri, $messages, $aggregateId);
    }

    public function check(string $id): SmsStatusResponseInterface
    {
        $uri = '/services/get-sms-status/' . $id;
        return $this->request('GET', $uri);
    }

    public function cancel(string $id): SmsResponseInterface
    {
        $uri = '/services/cancel-sms/' . $id;
        return $this->request('POST', $uri);
    }

    public function newSmsReceiveds(): SmsReceivedResponseInterface
    {
        $uri = '/services/received/list';
        return $this->request('POST', $uri);
    }

    public function searchSmsReceiveds(
        $start,
        $end,
        ?string $mobile = null,
        ?string $id = null
    ): SmsReceivedResponseInterface {
        if ($start instanceof DateTime) {
            $start = $start->format('Y-m-d\TH:i:s');
        }
        $start = rawurlencode($start);
        if ($end instanceof DateTime) {
            $end = $end->format('Y-m-d\TH:i:s');
        }
        $end = rawurlencode($end);

        $uri = '/services/received/search/' . $start . '/' . $end;
        if ($mobile !== null) {
            $uri .= '?mobile=' . rawurlencode($mobile);
        }
        if ($id !== null) {
            if ($mobile !== null) {
                $uri .= '&';
            } else {
                $uri .= '?';
            }
            $uri .= 'mtId=' . rawurlencode($id);
        }

        return $this->request('GET', $uri);
    }

    /**
     * @param ResponseInterface $response
     * @param string $url
     * @throws RuntimeException
     */
    protected function checkResponse(ResponseInterface $response, string $url = '')
    {
        if ($response->getStatusCode() >= 400) {
            $exceptionMessage = $response->getStatusCode() . ' - ' . $response->getReasonPhrase() . PHP_EOL
                . 'Server Response' . PHP_EOL
                . $response->getBody()->getContents() . '.' . PHP_EOL
                . 'Api Request' . PHP_EOL;

            if (! empty($url)) {
                $exceptionMessage .= '[' . $url . ']';
            }

            throw new RuntimeException($exceptionMessage);
        }
    }

    /**
     * @param string $method
     *
     * @return array
     */
    protected function getBaseHeaders(string $method): array
    {
        return in_array($method, ['POST', 'PUT'])
            ? ['Content-Type' => 'application/json', 'Accept' => 'application/json']
            : ['Accept' => 'application/json'];
    }
}
