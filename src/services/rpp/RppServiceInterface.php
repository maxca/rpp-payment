<?php

namespace Samark\RppPayment\Services\Rpp;

/**
 * Interface RppServiceInterface
 * @package Samark\RppPayment\Services\Rpp
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface RppServiceInterface
{
    /**
     * @return mixed
     */
    public function getToken();

    /**
     * @param array $params
     * @return mixed
     */
    public function requestOtp($params=[]);

    /**
     * @param array $params
     * @return mixed
     */
    public function verifyOtp($params=[]);

    /**
     * @param array $params
     * @return mixed
     */
    public function charge($params=[]);

    /**
     * @param array $params
     * @return mixed
     */
    public function cancel($params=[]);
}

