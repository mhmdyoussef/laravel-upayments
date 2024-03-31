<?php

namespace Mydevpro\Upayments;

use Exception;
use Mydevpro\Upayments\Helper\PaymentGatewayInterface;
use Mydevpro\Upayments\Helper\Service;

class Upayments extends Service implements PaymentGatewayInterface
{

    /**
     * @param float $amount
     * @param string $currency
     * @param string $orderID
     * @param string $paymentDescription
     * @throws Exception
     */
    public function authorize(float $amount, string $currency, string $orderID, string $paymentDescription = '')
    {
        try {

            $this->setEndpoint('charge');

            $data = [
                "order" => [
                    "id" => $orderID,
                    "reference" => $orderID,
                    "description" => $paymentDescription,
                    "currency" => $currency,
                    "amount" => $amount,
                ],
                "language" => "ar",
                "reference" => [
                    "id" => $orderID,
                ],
                "returnUrl" => config('upayments.url.return'),
                "cancelUrl" => config('upayments.url.cancel'),
                "notificationUrl" => config('upayments.url.notification'),
            ];

            return $this->getClient()->post($this->getBasePath() . $this->getEndpoint(), $data)->json();

        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

    }

    /**
     * @param string $track_id
     * @return mixed
     * @throws Exception
     */
    public function getPaymentStatus(string $track_id)
    {
        try {

            $this->setEndpoint('get-payment-status/');

            return $this->getClient()->get($this->getBasePath() . $this->getEndpoint() . $track_id)->json();

        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

    }

    /**
     * @param string $orderID
     * @param float $amount
     * @return mixed
     * @throws Exception
     */
    public function refund(string $orderID, float $amount)
    {
        try {

            $this->setEndpoint('create-refund');

            $data = [
                "orderId"       => $orderID,
                "totalPrice"    => $amount,
            ];

            return $this->getClient()->post($this->getBasePath() . $this->getEndpoint(), $data)->json();

        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

    }

}
