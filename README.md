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

# method can be using
    - token 
    - getToken
    - requestOtp
    - verifyOtp
    - charge
    - cancel 
# example use
```php
use Samark\RppPayment\Facades\RppPayment; 
...
...
public function getToken() {
    $data = RppPayment::getToken();
}

public function otp() {
     $data = RppPayment::token()
            ->requestOtp(['mobile' => '08xxxxxxx']);
}

public function verify() {
     $data = RppPayment::token()
            ->verifyOtp(['mobile' => '08xxxxxxx','key' => 'value']);
}

public function charge() {
    $data = RppPayment::token()
            ->charge(['mobile' => '08xxxxxxx','key' => 'value']);
}

public function cancel() {
    $data = RppPayment::token()
            ->cancel(['mobile' => '08xxxxxxx','key' => 'value']);
}
...
...

```
# config please read in comment in file how to change it.
```$xslt
config\rpp-payment.php
```
# support
samarkchsngn@gmail.com