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
        return $this->auth->getToken();
    }

    /**
     *
     */
    public function requestOtp()
    {
        // TODO: Implement requestOtp() method.
    }

    /**
     *
     */
    public function verifyOtp()
    {
        // TODO: Implement verifyOtp() method.
    }

    /**
     *
     */
    public function charge()
    {
        // TODO: Implement charge() method.
    }

    /**
     *
     */
    public function refund()
    {

    }


}
