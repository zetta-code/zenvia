<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

use Zetta\Zenvia\Constant\RequestParam;
use Zetta\Zenvia\Constant\ResponseParam;
use Zetta\Zenvia\Exception;
use Zetta\Zenvia\Http\ResponseInterface;
use Zetta\Zenvia\Http\SmsReceivedResponse;
use Zetta\Zenvia\Http\SmsReceivedResponseInterface;
use Zetta\Zenvia\Http\SmsRequest;
use Zetta\Zenvia\Http\SmsRequestInterface;
use Zetta\Zenvia\Http\SmsResponse;
use Zetta\Zenvia\Http\SmsResponseInterface;
use Zetta\Zenvia\Http\SmsStatusResponse;
use Zetta\Zenvia\Http\SmsStatusResponseInterface;
use Zetta\Zenvia\Model\SmsInterface;
use Zetta\Zenvia\Model\SmsReceived;

class Util
{

    /**
     * @param SmsInterface $message
     * @param int $aggregateId
     * @return string|null
     */
    public static function smsToJson($message, $aggregateId = null)
    {
        $array = $message->getArrayCopy();
        if ($aggregateId !== null) {
            $array[RequestParam::AGGREGATE_ID_KEY] = $aggregateId;
        }
        $json = json_encode([RequestParam::SEND_SMS_REQUEST => $array]);
        return $json;
    }

    /**
     * @param SmsInterface[] $list
     * @param int $aggregateId
     * @return string|null
     */
    public static function listToJson($list, $aggregateId = null)
    {
        if (is_array($list)) {
            $array = [
                RequestParam::SEND_SMS_REQUEST_LIST => []
            ];
            if ($aggregateId != null) {
                $array[RequestParam::AGGREGATE_ID_KEY] = $aggregateId;
            }
            foreach ($list as $message) {
                $array[RequestParam::SEND_SMS_REQUEST_LIST][] = $message->getArrayCopy();
            }
            return json_encode([RequestParam::SEND_SMS_MULTI_REQUEST => $array]);
        }
        return null;
    }

    /**
     * @param SmsInterface|array $data
     * @param string $aggregateId
     * @return string
     */
    public static function stringify($data, $aggregateId = null)
    {
        if (is_array($data)) {
            return self::listToJson($data, $aggregateId);
        } else if ($data instanceof SmsInterface) {
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
     * @return SmsResponseInterface|SmsResponseInterface[]|SmsStatusResponseInterface|SmsReceivedResponseInterface
     */
    public static function toSmsResponse($response)
    {
        $json = json_decode($response->getBody(), true);

        $smsResponse = null;
        if (isset($json[ResponseParam::SEND_SMS_RESPONSE])) {
            $smsResponse = static::createSmsResponseFromArray($json[ResponseParam::SEND_SMS_RESPONSE], ResponseParam::SEND_SMS_RESPONSE);
        } elseif (isset($json[ResponseParam::SEND_SMS_MULTI_RESPONSE])) {
            $smsResponse = static::createArraySmsResponseFromArray($json[ResponseParam::SEND_SMS_MULTI_RESPONSE], ResponseParam::SEND_SMS_MULTI_RESPONSE);
        } elseif (isset($json[ResponseParam::GET_SMS_STATUS_RESP])) {
            $smsResponse = static::createStatusResponseFromArray($json[ResponseParam::GET_SMS_STATUS_RESP], ResponseParam::GET_SMS_STATUS_RESP);
        } elseif (isset($json[ResponseParam::CANCEL_SMS_RESP])) {
            $smsResponse = static::createSmsResponseFromArray($json[ResponseParam::CANCEL_SMS_RESP], ResponseParam::CANCEL_SMS_RESP);
        } elseif (isset($json[ResponseParam::RECEIVED_RESPONSE])) {
            $smsResponse = static::createSmsReceivedResponseFromArray($json[ResponseParam::RECEIVED_RESPONSE], ResponseParam::RECEIVED_RESPONSE);
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
        if (isset($json[RequestParam::CALLBACK_MT_REQUEST])) {
            $smsRequest = static::createSmsRequestFromArray($json[RequestParam::CALLBACK_MT_REQUEST], RequestParam::CALLBACK_MT_REQUEST);
        } elseif (isset($json[RequestParam::CALLBACK_MO_REQUEST])) {
            $smsRequest = static::createSmsReceivedRequestFromArray($json[RequestParam::CALLBACK_MO_REQUEST], RequestParam::CALLBACK_MO_REQUEST);
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
     * @param array $array
     * @param string $name
     * @return SmsResponse
     */
    public static function createSmsResponseFromArray($array, $name = null)
    {
        $response = new SmsResponse($array['statusCode'], $array['statusDescription'], $array['detailCode'], $array['detailDescription']);
        if ($name !== null) {
            $response->setName($name);
        }
        return $response;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsRequest
     */
    public static function createSmsRequestFromArray($array, $name = null)
    {
        $request = new SmsRequest($name);
        $request->exchangeArray($array);

        return $request;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsResponse[]
     */
    public static function createArraySmsResponseFromArray($array, $name = null)
    {
        $responses = [];
        foreach ($array[ResponseParam::SEND_SMS_RESPONSE_LIST] as $response) {
            $responses[] = static::createSmsResponseFromArray($response, $name);
        }
        return $responses;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsStatusResponse
     */
    public static function createStatusResponseFromArray($array, $name = null)
    {
        $response = new SmsStatusResponse($array['statusCode'], $array['statusDescription'], $array['detailCode'], $array['detailDescription']);
        if ($name !== null) {
            $response->setName($name);
        }
        $response->setId($array['id']);
        $response->setReceived($array['received']);
        $response->setShortCode($array['shortcode']);
        $response->setMobileOperatorName($array['mobileOperatorName']);
        return $response;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsReceivedResponse
     */
    public static function createSmsReceivedResponseFromArray($array, $name = null)
    {
        $response = new SmsReceivedResponse($array['statusCode'], $array['statusDescription'], $array['detailCode'], $array['detailDescription']);
        if ($name !== null) {
            $response->setName($name);
        }
        foreach ($array[ResponseParam::RECEIVED_MESSAGES] as $received) {
            $response->addReceived(self::createSmsReceivedFromArray($received));
        }
        return $response;
    }

    /**
     * @param array $array
     * @param string $name
     * @return SmsRequest
     */
    public static function createSmsReceivedRequestFromArray($array, $name = null)
    {
        $request = new SmsRequest($name);
        $request->setSmsReceived(self::createSmsReceivedFromArray($array));

        return $request;
    }
}
