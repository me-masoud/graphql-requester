<?php

namespace GraphqlRequester\Factorial;
class Query
{
    public function getTemplate(string $queryName, array $arguments = [], array $retrieves = []):string
    {
        $processedArguments = '';
        $i = 0;
        $length = count($arguments);
        foreach ($arguments as $key => $argument) {
            $i++;
            $processedArguments .= (' '. $key . ':' . $argument  );
            if ($i  < $length) {
                $processedArguments .= $i != $length ? ',' : '';
            }

        }
        $retrieves = implode("\n" , $retrieves);

        $query =
            "query { $queryName($processedArguments) {
                    $retrieves
                }
            }
            ";
        return $query;
    }
}