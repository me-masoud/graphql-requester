<?php

namespace GraphqlRequester\Factorial;
class Query
{
    public function getTemplateSingle(string $queryName, array $arguments = [], array $retrieves = []):string
    {
        $retrieves = implode("\n" , $retrieves);
        $processedArguments = $this->makeArguments($arguments);
        return
            "query { $queryName($processedArguments) {
                    $retrieves
                }
            }
            ";
    }

    private function makeArguments(array $arguments = []): string
    {
        $processedArguments = '';
        $i = 0;
        $length = count($arguments);
        foreach ($arguments as $key => $argument) {
            $i++;
            $processedArguments .= (' '. $key . ':' . $argument  );
            if ($i  < $length) {
                $processedArguments .= ',';
            }

        }
        return $processedArguments;
    }

    public function getTemplateAll(string $queryName, array $arguments = [], array $retrieves = []):string
    {
        $retrieves = implode("\n" , $retrieves);
        $processedArguments = $this->makeArguments($arguments);
        return
            "query { $queryName($processedArguments) {
                    data{
                        $retrieves
                    }
                }
            }
            ";
    }
}