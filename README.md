# Laravel Upayments
laravel Upayments is a php package written by [MY-Dev | Mohamed Youssef](https://my-dev.pro) with laravel to handle Upayments functionality by making it's api more easy .

## Features
- Authorize payment
- Check that payment is success or not
- Refund invoice

# Installation Guide
Composer installation
```
composer require mydevpro/upayments 
```

## Configuration

Add this line on your config/app.php file providers list
```
Mydevpro\Upayments\PaymentServiceProvider::class,
```
To publish config run
```
php artisan vendor:publish --provider="Mydevpro\Upayments\PaymentServiceProvider" --tag="upayments-config"
```
and modify the config file with your own information. File is located in `/config/upayments.php`

## Get Your Credentials From Upayments
- Go to [Upayments](https://upay.upayments.com/auth/login/)
- You will get API KEY
- Go to your .env file and paste your credentials to be like this and be sure that you added this value only on APP_ENV=productoin

 ```
UPAYMENTS_APIKEY=apikey
 ```

UPayments will check your application environment if Your APP_ENV="local" in .env file will use "Sandbox mode" and on APP_ENV="production" will use "Live payment account"


## You are now ready to use the package


At the controller
 ```
use Mydevpro\Upayments\Facades\Upayments;
 
 Upayments::authorize(Amount, ISO 3-Letter Currency Code, Order ID);
 
 ```

Check payment status

```
Upayments::getPaymentStatus(order_id);
```

Refund payment
 ```
Upayments::refund(order_id , amount);
 ```
