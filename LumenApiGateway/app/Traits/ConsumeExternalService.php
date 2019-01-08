<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($methotd, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $response = $client->request($methotd, $requestUrl,
            ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}