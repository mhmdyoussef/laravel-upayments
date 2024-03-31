<?php
return [
    /**
     * If you have availed the UInterface API, you can find your API details (API Key or Bearer Token) from your UPay Dashboard
     *
     * UPay -> API -> API Details for UPay v2 (or)
     * My Profile (Account) -> API Details for UPay v1
     */
    'apikey'    => env('UPAYMENTS_APIKEY', 'jtest123'),

    /**
     * Available modes we can use is:
     *      Sandbox     => Testing environment,
     *      Production  => live environment
     */
    'mode'  => [
        'sandbox'       => 'https://sandboxapi.upayments.com/api/v1/',
        'production'    => 'https://uapi.upayments.com/api/v1/',
    ],

    /**
     * Change this links to match your own website links which used for:
     *  return          => used to redirect client after success payment to your website success page.
     *  cancel          => used to redirect client after (failed or cancelled) payment to your website failure page.
     *
     *  notification    => used as a Webhooks (Web Callback) provides payment information to your application in real-time when
     *  (a payment is successful, a payment fails, error in payment).
     */
    'url' => [
        'return'    => 'https://upayments.com/en/',
        'cancel'    => 'https://error.com',
        'notification' => 'https://webhook.site/b381b892-ccf3-48f9-a415-625b29885611'
    ],
];
