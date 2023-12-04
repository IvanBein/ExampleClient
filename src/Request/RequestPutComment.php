<?php

namespace Ivanb\ExampleClient\Request;

class RequestPutComment extends AbstractRequest
{
    protected string $method = self::TYPE_METHOD_PUT;
    protected function getUrl(): string
    {
        return "comment" . $this->optionsData->getRequestParameters();
    }

}