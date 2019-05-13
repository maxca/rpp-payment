<?php

namespace Samark\RppPayment\Services\Otp;

/**
 * Interface VerifyOtpInterface
 * @package Samark\RppPayment\Services\Otp
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface OtpInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function verify($params = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function request($params = []);
}