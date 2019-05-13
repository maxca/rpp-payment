<?php

namespace Samark\RppPayment\Services\Rpp;

use Samark\RppPayment\Services\Otp\Otp;
use Samark\RppPayment\Services\Payment\Payment;
use Samark\RppPayment\Services\Auth\Auth;

/**
 * Class RppService
 * @package Samark\RppPayment\Services\Rpp
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class RppService implements RppServiceInterface
{
    /**
     * @var \Samark\RppPayment\Services\Auth\Auth
     */
    protected $auth;

    /**
     * @var \Samark\RppPayment\Services\Otp\Otp
     */
    protected $otp;

    /**
     * @var \Samark\RppPayment\Services\Payment\Payment
     */
    protected $payment;

    /**
     * @var string bearer token
     */
    protected $token;

    /**
     * RppService constructor.
     * @param \Samark\RppPayment\Services\Auth\Auth $auth
     * @param \Samark\RppPayment\Services\Otp\Otp $otp
     * @param \Samark\RppPayment\Services\Payment\Payment $payment
     */
    public function __construct(Auth $auth, Otp $otp, Payment $payment)
    {
        $this->auth    = $auth;
        $this->otp     = $otp;
        $this->payment = $payment;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken()
    {
        $auth = $this->auth->getToken();
        if (isset($auth['access_token']) && self::getConfigStoreToken()) {
            $this->token = $auth['access_token'];
            session(config(PACKAGE_NAME . '.token.name'), $auth);
        }
        if(request()->has('debug')) {
            dump($auth);
        }
        return $auth;
    }

    /**
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function token()
    {
        self::getToken();
        return $this;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function getConfigStoreToken()
    {
        return config(PACKAGE_NAME . '.token.store', false);
    }


    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function requestOtp($params = [])
    {
        return $this->otp->request($params, $this->token);
    }


    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verifyOtp($params = [])
    {
        return $this->otp->verify($params, $this->token);
    }


    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function charge($params = [])
    {
        return $this->payment->charge($params, $this->token);
    }


    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel($params = [])
    {
        return $this->payment->cancel($params, $this->token);
    }


}
