<?php

namespace Samark\RppPayment\Services\Auth;

/**
 * Interface AuthInterface
 * @package Samark\RppPayment\Services\Auth
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface AuthInterface
{

    /**
     * @return array
     */
    public function getToken(): array;
}