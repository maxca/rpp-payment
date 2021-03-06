# rpp-payment
for RPP payments integration

# install 
```
 composer require samarkchaisanguan/rpp-payment
```
# publish vendor configuration 
```
 php artisan vendor:publish --provider=Samark\RppPayment\Providers\RppServiceProvider
```
or 

```
php artisan vendor:publish 
```
# config env
```$xslt
# Endpoint for getway rpp payment
RPP_PAYMENT_URL=https://alpha-gateway.weomni-test.com
# username and password for login basic authen
RPP_USERNAME=
RPP_PASSWORD=
# Endpont for getway merchant
RPP_MERCHANT_URL=https://staging-am-rpp.eggdigital.com

```
# method can be using
    - token 
    - getToken
    - requestOtp
    - verifyOtp
    - charge
    - cancel 
# example use
```php
<?php namespace Samark\RppPayment\Http\Controllers;

use Illuminate\Http\Request;
use Samark\RppPayment\Facades\RppPayment;

/**
 * Class RppController
 * @package App\Http\Controllers
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class RppController extends Controller
{
    /**
     * @return string
     */
    public function token()
    {
        return RppPayment::token();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function requestOtp(Request $request)
    {
        return RppPayment::token()
            ->requestOtp(['mobile' => $request->mobile]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function verify(Request $request)
    {
        return RppPayment::token()
            ->verifyOtp([
                'mobile'   => $request->mobile,
                'otpCode'  => $request->otpCode,
                'otpRef'   => $request->otpRef,
                'authCode' => $request->authCode,
            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function charge(Request $request)
    {
        return RppPayment::token()
            ->charge([
                'amount'        => $request->amount,
                'currency'      => $request->get('currency', 'thb'),
                'name'          => $request->get('name'),
                'description'   => $request->get('description'),
                'mobile'        => $request->mobile,
                'channel'       => $request->get('channel', 'POS'),
                'txRefId'       => $request->txRefId,
                'merchantId'    => $request->merchantId,
                'outletId'      => $request->outletId,
                'terminalId'    => $request->terminalId,
                'paymentMethod' => $request->get('paymentMethod','WALLET'),
                'tmnToken'      => $request->tmnToken,
            ]);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function cancel(Request $request)
    {
        return RppPayment::token()
            ->cancel([
                'txRefId'    => $request->txRefId,
                'merchantId' => $request->merchantId,
                'outletId'   => $request->outletId,
                'terminalId' => $request->terminalId,
            ]);
    }
}

```
# by pass token
```php
 /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function charge(Request $request)
    {
        return RppPayment::token($request->token)
            ->charge([
                'amount'        => $request->amount,
                'currency'      => $request->get('currency', 'thb'),
                'name'          => $request->get('name'),
                'description'   => $request->get('description'),
                'mobile'        => $request->mobile,
                'channel'       => $request->get('channel', 'POS'),
                'txRefId'       => $request->txRefId,
                'merchantId'    => $request->merchantId,
                'outletId'      => $request->outletId,
                'terminalId'    => $request->terminalId,
                'paymentMethod' => $request->get('paymentMethod','WALLET'),
                'tmnToken'      => $request->tmnToken,
            ]);

    }
```

# config please read in comment in file how to change it.
```$xslt
config\rpp-payment.php
```
# support
samarkchsngn@gmail.com