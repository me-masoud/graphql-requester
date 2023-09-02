<?php

namespace GraphqlRequester\Code;

use GuzzleHttp\Client;

class GraphqlRequest
{
    public function __construct(
        public null|string $route = null
    )
    {
        if (!$this->route)
            $this->route = config('graphql-requester.destination_url');;
    }

    public function query(string $queryName, array $arguments, array $retrieves , string $type = 'all')
    {
        $query    = new Query();
        if ($type != 'all')
            $template = $query->getTemplateSingle($queryName , $arguments , $retrieves);
        else
            $template = $query->getTemplateAll($queryName , $arguments , $retrieves);

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

            return json_decode($response->getBody(), true);
        }catch (\Exception $e) {
            throw $e;
        }
    }
    public function mutation(string $queryName, array $arguments, array|string $retrieves = null , $variable = null)
    {
        $query    = new Mutation();
        $template = $query->getTemplateCreate($queryName , $arguments , $retrieves, $variable);


        $requestPayload = [
            'query' => $template,
            'variables' => $variable
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
            return json_decode($response->getBody(), true);
        }catch (\Exception $e) {
            throw $e;
        }
    }

    public function raw($query, $variables = null)
    {
        $requestPayload = [
            'query' => $query,
            'variables' => $variables
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
            return json_decode($response->getBody(), true);
        }catch (\Exception $e) {
            throw $e;
        }
    }

}
