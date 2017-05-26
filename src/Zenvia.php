<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

use Zend\Http as ZendHttp;
use Zetta\Zenvia\Exception\InvalidHttpClientException;
use Zetta\Zenvia\Exception\RuntimeException;
use Zetta\Zenvia\Http\ResponseInterface;

class Zenvia implements ZenviaInterface
{
    const DEFAULT_WEBSERVICE_URL = 'https://api-rest.zenvia360.com.br';

    /**
     * Authenticator instance
     *
     * @var AuthenticatorInterface
     */
    protected $authenticator;

    /**
     * WebServiceUrl
     *
     * @var string
     */
    protected $webServiceUrl;

    /**
     * HTTP client object to use for retrieving feeds
     *
     * @var Http\ClientInterface
     */
    protected $httpClient = null;

    /**
     * Override HTTP PUT and DELETE request methods?
     *
     * @var bool
     */
    protected $httpMethodOverride = false;

    /**
     * HttpConditionalGet
     *
     * @var bool
     */
    protected $httpConditionalGet = false;

    /**
     * @param string $account
     * @param string $password
     * @param string $webServiceUrl
     */
    public function __construct($account, $password, $webServiceUrl = null)
    {
        $this->authenticator = new Authenticator($account, $password);
        if($webServiceUrl === null){
            $this->webServiceUrl = self::DEFAULT_WEBSERVICE_URL;
        } else{
            $this->webServiceUrl = $webServiceUrl;
        }
    }

    /**
     * @param AuthenticatorInterface $authenticator
     * @return $this
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator)
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * @return AuthenticatorInterface
     */
    public function getAuthenticator()
    {
        return $this->authenticator;
    }

    /**
     * Get the Zenvia webServiceUrl
     * @return string
     */
    public function getWebServiceUrl()
    {
        return $this->webServiceUrl;
    }

    /**
     * Set the Zenvia webServiceUrl
     * @param string $webServiceUrl
     * @return Zenvia
     */
    public function setWebServiceUrl($webServiceUrl)
    {
        $this->webServiceUrl = $webServiceUrl;
        return $this;
    }

    /**
     * Get the Sms httpClient
     * @return Http\ClientInterface
     */
    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new Http\ZendHttpClientDecorator(new ZendHttp\Client());
        }

        return $this->httpClient;
    }

    /**
     * Set the Sms httpClient
     * @param Http\ClientInterface $httpClient
     */
    public function setHttpClient($httpClient)
    {
        if ($httpClient instanceof ZendHttp\Client) {
            $httpClient = new Http\ZendHttpClientDecorator($httpClient);
        }

        if (!$httpClient instanceof Http\ClientInterface) {
            throw new InvalidHttpClientException();
        }
        $this->httpClient = $httpClient;
    }

    /**
     * Get the Sms httpMethodOverride
     * @return bool
     */
    public function isHttpMethodOverride()
    {
        return $this->httpMethodOverride;
    }

    /**
     * Set the Sms httpMethodOverride
     * @param bool $httpMethodOverride
     */
    public function setHttpMethodOverride($httpMethodOverride)
    {
        $this->httpMethodOverride = $httpMethodOverride;
    }

    /**
     * Get the Sms httpConditionalGet
     * @return bool
     */
    public function isHttpConditionalGet()
    {
        return $this->httpConditionalGet;
    }

    /**
     * Set the Sms httpConditionalGet
     * @param bool $httpConditionalGet
     */
    public function setHttpConditionalGet($httpConditionalGet)
    {
        $this->httpConditionalGet = $httpConditionalGet;
    }

    /**
     * {@inheritdoc}
     */
    public function send($message, $aggregateId = null)
    {
        $client = $this->getHttpClient();
        $url = $this->webServiceUrl . '/services/send-sms';

        $json = Util::stringify($message, $aggregateId);
        $response = $client->post($url, $json, $this->getBaseHeaders());
        $this->checkResponse($response, $url);

        return Util::toSmsResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function sendMultiple($messages, $aggregateId = null)
    {
        $client = $this->getHttpClient();
        $url = $this->webServiceUrl . '/services/send-sms-multiple';

        $json = Util::stringify($messages, $aggregateId);
        $response = $client->post($url, $json, $this->getBaseHeaders());
        $this->checkResponse($response, $url);

        return Util::toSmsResponse($response);

    }

    /**
     * {@inheritdoc}
     */
    public function check($id)
    {
        $client = $this->getHttpClient();
        $url = $this->webServiceUrl . '/services/get-sms-status/' . $id;

        $response = $client->get($url, $this->getBaseHeaders());
        $this->checkResponse($response, $url);

        return Util::toSmsResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function cancel($id)
    {
        $client = $this->getHttpClient();
        $url = $this->webServiceUrl . '/services/cancel-sms/' . $id;

        $response = $client->post($url, null, $this->getBaseHeaders());
        $this->checkResponse($response, $url);

        return Util::toSmsResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function newSmsReceiveds(){
        $client = $this->getHttpClient();
        $url = $this->webServiceUrl . '/services/received/list';

        $response = $client->post($url, null, $this->getBaseHeaders());
        $this->checkResponse($response, $url);
        return Util::toSmsResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function searchSmsReceiveds($start, $end, $mobile = null, $id = null){
        $client = $this->getHttpClient();

        if ($start instanceof \DateTime) {
            $start = $start->format('Y-m-d\TH:i:s');
        }
        $start = rawurlencode($start);
        if ($end instanceof \DateTime) {
            $end = $end->format('Y-m-d\TH:i:s');
        }
        $end = rawurlencode($end);

        $url = $this->webServiceUrl . '/services/received/search/' . $start . '/' . $end;
        if ($mobile !== null) {
            $url .= '?mobile=' . rawurlencode($mobile);
        }
        if ($id !== null) {
            if ($mobile !== null) {
                $url .= '&';
            } else {
                $url .= '?';
            }
            $url .= 'mtId=' . rawurlencode($id);
        }

        $response = $client->get($url, $this->getBaseHeaders());
        $this->checkResponse($response, $url);

        return Util::toSmsResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @param string $url
     * @throws RuntimeException
     */
    protected function checkResponse($response, $url = '')
    {
        if ($response->getStatusCode() >= 400) {
            $exceptionMessage = $response->getStatusCode() . ' - ' . $response->getStatusDescription() . PHP_EOL
                . 'Server Response' . PHP_EOL
                . $response->getBody() . '.' . PHP_EOL
                . 'Api Request' . PHP_EOL
                . '[' . $url;
            throw new RuntimeException($exceptionMessage);
        }
    }

    /**
     * Headers base para as requisições.
     * @return array Array associativo com os headers comuns das requisições.
     */
    protected function getBaseHeaders(){
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . $this->authenticator->getAuthorizationCode()
        ];
    }
}
