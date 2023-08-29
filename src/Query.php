<?php

namespace GraphqlRequester\Factorial;
class Query
{
    public function getTemplate(string $queryName, array $arguments = [], array $retrieves = []):string
    {
        $processedArguments = '';
        foreach ($arguments as $key => $argument) {
            $processedArguments .= ' '. $key . ':' . $argument . ', ';
        }
        $retrieves = implode("\n" , $retrieves);

        return sprintf(
            "
                query {
                    %s(%s) {
                    %s
                }
            }
            ",
            $queryName,
            $processedArguments,
            $retrieves
        );
    }
}