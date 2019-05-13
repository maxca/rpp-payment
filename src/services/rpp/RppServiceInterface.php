<?php

namespace Samark\RppPayment\Services\Rpp;

interface RppServiceInterface
{
    public function getToken();

    public function requestOtp();

    public function verifyOtp();

    public function charge();
}

