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
    protected $configList = [
        'request' => 'otp.request',
        'verify'  => 'otp.verify',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $params
     * @return mixed|void
     */
    public function request($params = [])
    {

    }


    /**
     * @param array $params
     * @return mixed|void
     */
    public function verify($params = [])
    {

    }

    public function __call($name, $arguments)
    {
        if (array_key_exists($name, $this->configList)) {
            $this->configEndpoint = $this->configList[$name];
        }
    }


}