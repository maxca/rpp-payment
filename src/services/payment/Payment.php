<?php

namespace Samark\RppPayment\Services\Payment;

use Samark\RppPayment\Services\BaseService;

/**
 * Class Payment
 * @package Samark\RppPayment\Services\Payment
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class Payment extends BaseService implements PaymentInterface
{
    /**
     * @var array list of endpoint
     */
    protected $configList = [
        'charge' => 'payment.charge',
        'cancel' => 'payment.cancel',
    ];

    /**
     * @param array $params
     * @param null $token
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function charge($params = [], $token = null)
    {
        parent::setEndpointConfig('charge');
        return $this->callPostBearerAuth($params, $token);
    }

    /**
     * @param array $params
     * @param null $token
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel($params = [], $token = null)
    {
        parent::setEndpointConfig('cancel');
        return $this->callPostBearerAuth($params, $token);
    }

}