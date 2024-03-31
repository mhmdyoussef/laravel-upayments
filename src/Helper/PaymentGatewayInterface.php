<?php

namespace Mydevpro\Upayments\Helper;

interface PaymentGatewayInterface
{
    public function authorize(float $amount, string $currency, string $orderID, string $paymentDescription);
}
