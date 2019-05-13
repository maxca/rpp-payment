<?php

require '../vendor/autoload.php';

echo 'ok';

use Samark\RppPayment\Services\Auth\Auth;

$app = new Auth();

dd($app);