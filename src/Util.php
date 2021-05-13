<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia;

use Zetta\Zenvia\Contract\SmsInterface;
use Zetta\Zenvia\Contract\SmsReceivedResponseInterface;
use Zetta\Zenvia\Contract\SmsRequestInterface;
use Zetta\Zenvia\Contract\SmsResponseInterface;
use Zetta\Zenvia\Contract\SmsStatusResponseInterface;
use Zetta\Zenvia\Enum\RequestParamEnum;
use Zetta\Zenvia\Enum\ResponseParamEnum;
use Zetta\Zenvia\Http\SmsReceivedResponse;
use Zetta\Zenvia\Http\SmsRequest;
use Zetta\Zenvia\Http\SmsResponse;
use Zetta\Zenvia\Http\SmsStatusResponse;
use Zetta\Zenvia\Model\SmsReceived;
use Psr\Http\Message\ResponseInterface;

class Util
{

    /**
     * @param SmsInterface $message
     * @param string|int|null $aggregateId
     * @return string|null
     */
    public static function smsToJson($message, $aggregateId = null)
    {
        $array = $message->getArrayCopy();
        if ($aggregateId !== null) {
            $array[RequestParamEnum::aggregateId()->value] = $aggregateId;
        }
        $json = json_encode([RequestParamEnum::sendSmsRequest()->value => $array]);
        return $json;
    }

    /**
     * @param SmsInterface[] $list
     * @param string|int|null $aggregateId
     * @return string|null
     */
    public static function listToJson($list, $aggregateId = null)
    {
        if (is_array($list)) {
            $array = [
                RequestParamEnum::sendSmsRequestList()->value => []
            ];
            if ($aggregateId != null) {
                $array[RequestParamEnum::aggregateId()->value] = $aggregateId;
            }
            foreach ($list as $message) {
                $array[RequestParamEnum::sendSmsRequestList()->value][] = $message->getArrayCopy();
            }
            return json_encode([RequestParamEnum::sendSmsMultiRequest()->value => $array]);
        }
        return null;
    }

    /**
     * @param SmsInterface|array $data
     * @param string|int|null $aggregateId
     * @return string
     */
    public static function stringify($data, $aggregateId = null)
    {
        if (is_array($data)) {
            return self::listToJson($data, $aggregateId);
        } elseif ($data instanceof SmsInterface) {
            return self::smsToJson($data, $aggregateId);
        } else {
            throw new Exception\InvalidArgumentException(sprintf(
                '$data is object or arrays of %s',
                get_class(SmsInterface::class)
            ));
        }
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public static function toSmsResponse($response)
    {
        $json = json_decode($response->getBody()->getContents(), true);

        $smsResponse = null;
        if (isset($json[ResponseParamEnum::sendSmsResponse()->value])) {
            $smsResponse = static::createSmsResponseFromArray(
                $json[ResponseParamEnum::sendSmsResponse()->value],
                ResponseParamEnum::sendSmsResponse()->label
            );
        } elseif (isset($json[ResponseParamEnum::sendSmsMultiResponse()->value])) {
            $smsResponse = static::createArraySmsResponseFromArray(
                $json[ResponseParamEnum::sendSmsMultiResponse()->value],
                ResponseParamEnum::sendSmsMultiResponse()->label
            );
        } elseif (isset($json[ResponseParamEnum::getSmsStatusResp()->value])) {
            $smsResponse = static::createStatusResponseFromArray(
                $json[ResponseParamEnum::getSmsStatusResp()->value],
                ResponseParamEnum::getSmsStatusResp()->label
            );
        } elseif (isset($json[ResponseParamEnum::cancelSmsResp()->value])) {
            $smsResponse = static::createSmsResponseFromArray(
                $json[ResponseParamEnum::cancelSmsResp()->value],
                ResponseParamEnum::cancelSmsResp()->label
            );
        } elseif (isset($json[ResponseParamEnum::receivedResponse()->value])) {
            $smsResponse = static::createSmsReceivedResponseFromArray(
                $json[ResponseParamEnum::receivedResponse()->value],
                ResponseParamEnum::receivedResponse()->label
            );
        }
        return $smsResponse;
    }

    /**
     * @param string $request
     * @return SmsRequestInterface
     */
    public static function toSmsRequest($request)
    {
        if (is_string($request)) {
            $json = json_decode($request, true);
        } else {
            $json = [];
        }

        $smsRequest = null;
        if (isset($json[RequestParamEnum::callbackMtRequest()->value])) {
            $smsRequest = static::createSmsRequestFromArray(
                $json[RequestParamEnum::callbackMtRequest()->value],
                RequestParamEnum::callbackMtRequest()->label
            );
        } elseif (isset($json[RequestParamEnum::callbackMoRequest()->value])) {
            $smsRequest = static::createSmsReceivedRequestFromArray(
                $json[RequestParamEnum::callbackMoRequest()->value],
                RequestParamEnum::callbackMoRequest()->label
            );
        }
        return $smsRequest;
    }

    /**
     * @param array $array
     * @return SmsReceived
     */
    public static function createSmsReceivedFromArray($array)
    {
        $smsReceived = new SmsReceived();
        $smsReceived->exchangeArray($array);

        return $smsReceived;
    }

    /**
     * @param array $context
     * @param string|null $name
     * @return SmsResponseInterface
     */
    public static function createSmsResponseFromArray(array $context = [], ?string $name = null)
    {
        $response = new SmsResponse(
            $context['statusCode'],
            $context['statusDescription'],
            $context['detailCode'],
            $context['detailDescription']
        );
        if (! empty($name)) {
            $response->setName($name);
        }
        return $response;
    }

    /**
     * @param array $context
     * @param string|null $name
     * @return SmsRequestInterface
     */
    public static function createSmsRequestFromArray(array $context = [], ?string $name = null)
    {
        $request = new SmsRequest($name);
        $request->exchangeArray($context);

        return $request;
    }

    /**
     * @param array $context
     * @param string|null $name
     * @return SmsResponseInterface[]
     */
    public static function createArraySmsResponseFromArray(array $context = [], ?string $name = null)
    {
        $responses = [];
        foreach ($context[ResponseParamEnum::sendSmsResponseList()->value] as $response) {
            $responses[] = static::createSmsResponseFromArray($response, $name);
        }
        return $responses;
    }

    /**
     * @param array $contect
     * @param string|null $name
     * @return SmsStatusResponseInterface
     */
    public static function createStatusResponseFromArray(array $context = [], ?string $name = null)
    {
        $response = new SmsStatusResponse(
            $context['statusCode'],
            $context['statusDescription'],
            $context['detailCode'],
            $context['detailDescription']
        );
        if (! empty($name)) {
            $response->setName($name);
        }
        $response->setId($context['id']);
        $response->setReceived($context['received']);
        $response->setShortCode($context['shortcode']);
        if (! empty($context['mobileOperatorName'])) {
            $response->setMobileOperatorName($context['mobileOperatorName']);
        }
        return $response;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsReceivedResponseInterface
     */
    public static function createSmsReceivedResponseFromArray(array $array = [], string $name = '')
    {
        $response = new SmsReceivedResponse(
            $array['statusCode'],
            $array['statusDescription'],
            $array['detailCode'],
            $array['detailDescription']
        );
        if (! empty($name)) {
            $response->setName($name);
        }
        $receiveds = $array[ResponseParamEnum::receivedMessages()->value];
        if (is_array($receiveds)) {
            foreach ($receiveds as $received) {
                $response->addReceived(self::createSmsReceivedFromArray($received));
            }
        }
        return $response;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsRequestInterface
     */
    public static function createSmsReceivedRequestFromArray($array, $name = null)
    {
        $request = new SmsRequest($name);
        $request->setSmsReceived(self::createSmsReceivedFromArray($array));

        return $request;
    }
}
