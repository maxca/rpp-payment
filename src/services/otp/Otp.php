<?php

namespace Samark\RppPayment\Services\Otp;

use Samark\RppPayment\Services\BaseService;

/**
 * Class VerifyOtp
 * @package Samark\RppPayment\Services\Otp
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class Otp extends BaseService implements OtpInterface
{
    /**
     * @var array
     */
    protected $configList = [
        'request' => 'otp.request',
        'verify'  => 'otp.verify',
    ];


    /**
     * @param array $params
     * @param null $token
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($params = [], $token = null)
    {
        parent::setEndpointConfig('request');
        return $this->callPostBearerAuth($params, $token);
    }


    /**
     * @param array $params
     * @param null $token
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify($params = [], $token = null)
    {
        parent::setEndpointConfig('verify');
        return $this->callPostBearerAuth($params, $token);
    }


}