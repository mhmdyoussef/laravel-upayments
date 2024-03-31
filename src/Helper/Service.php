<?php

namespace Mydevpro\Upayments\Helper;

use Illuminate\Support\Facades\Http;

abstract class Service
{
    protected $client;
    protected $mode;
    protected $endpoint;
    protected $apiKey;
    protected $basePath;
    protected $headers = [];

    /**
     * @return mixed
     */
    public function getClient()
    {
        $this->setMode();
        $this->setBasePath();
        $this->setAPIKey();

        $this->setHeaders('Content-Type', 'application/json');
        $this->setHeaders('Accept', 'application/json');
        $this->setHeaders('Authorization', 'Bearer ' . $this->getAPIKey());

        $this->setClient();

        return $this->client;
    }

    public function setClient()
    {
        $this->client = Http::withHeaders($this->getHeaders());
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @return $this
     */
    public function setMode(): Service
    {
        $this->mode = config('app.env');

        if ($this->mode == 'local') {
            $this->mode = 'sandbox';
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): Service
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAPIKey()
    {
        return $this->apiKey;
    }

    public function setAPIKey(): Service
    {
        $this->apiKey = config('upayments.apikey');

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    public function setBasePath(): void
    {
        $this->basePath = config('upayments.mode.' . $this->getMode());
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }


}
