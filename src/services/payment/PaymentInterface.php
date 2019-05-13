<?php

namespace Samark\RppPayment\Services\Payment;

/**
 * Interface PaymentInterface
 * @package Samark\RppPayment\Services\Payment
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface PaymentInterface
{

    /**
     * @param array $params
     * @param null $token
     * @return mixed
     */
    public function charge($params = [], $token = null);


    /**
     * @param array $params
     * @param null $token
     * @return mixed
     */
    public function cancel($params = [], $token = null);

}