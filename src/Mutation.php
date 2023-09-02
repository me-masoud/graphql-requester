<?php

namespace GraphqlRequester\Code;
class Mutation
{
    public function getTemplateCreate(string $mutationName, array $arguments = [], array $retrieves = []):string
    {
        $retrieves = implode("\n" , $retrieves);
        $processedArguments = $this->makeArguments($arguments);
        return
            "mutation { $mutationName $processedArguments {
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

        return $length < 1 ? '' : '(' . $processedArguments . ')';
    }

    public function getTemplateAll(string $queryName, array $arguments = [], array $retrieves = []):string
    {
        $retrieves = implode("\n" , $retrieves);
        $processedArguments = $this->makeArguments($arguments);
        return
            "query { $queryName  $processedArguments {
                    data{
                        $retrieves
                    }
                }
            }
            ";
    }
}