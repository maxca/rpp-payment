<?php

namespace Samark\RppPayment\Services\Auth;

use Samark\RppPayment\Services\BaseService;

/**
 * Class Auth
 * @package Samark\RppPayment\Services\Auth
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class Auth extends BaseService implements AuthInterface
{
    /**
     * @var string setting getting config
     * from config package name
     */
    protected $configEndpoint = 'auth';


    /**
     * Auth constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken(): array
    {
        return $this->callPostBasicAuth(['grant_type' => config(PACKAGE_NAME . '.grant_type')]);
    }
}