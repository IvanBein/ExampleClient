<?php

namespace Ivanb\ExampleClient\Option;

use Ivanb\ExampleClient\Option\Interface\IOptionHeaders;
use Ivanb\ExampleClient\RequestData\AbstractRequestData;

abstract class AbstractOptions implements IOptionHeaders
{
    protected AbstractRequestData $data;

    protected string $contentType = 'application/x-www-form-urlencoded';

    public function getHeaders(): array
    {
        return [
            'Content-Type' => $this->contentType,
            'Authorization' => $this->data->getAuthToken()
        ];
    }

}