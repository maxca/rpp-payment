<?php

namespace Samark\RppPayment\Services\Payment;

/**
 * Interface PaymentInterface
 * @package Samark\RppPayment\Services\Payment
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface PaymentInterface {

    /**
     * @return mixed
     */
    public function charge($params=[]);

    /**
     * @return mixed
     */
    public function refund();

}