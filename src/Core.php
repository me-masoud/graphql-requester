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
            return $client->post($this->route,
                [
                    'json' => $requestPayload
                ]
            );
        }catch (\Exception $e) {
            throw $e;
        }


    }


    public function mutation()
    {

    }
}