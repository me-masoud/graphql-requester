<?php

namespace GraphqlRequester\Factorial;
use GuzzleHttp\Client;

class Core
{
    public function __construct(
        public string $route
    )
    {
    }

    public function query(string $queryName, array $arguments, array $retrieves)
    {
        $query    = new Query();
        $template = $query->getTemplate($queryName , $arguments , $retrieves);

        $requestPayload = [
            'query' => $template,
            'variables' => null
        ];
        try {
            $client = new Client();

            $response =  $client->post($this->route,
                [
                    'json' => $requestPayload,
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                ]
            );

            $body = $response->getBody();
            $data = json_decode($body, true);
            return $data;
        }catch (\Exception $e) {
            throw $e;
        }


    }


    public function mutation()
    {

    }
}