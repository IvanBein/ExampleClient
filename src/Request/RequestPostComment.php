<?php

namespace Ivanb\ExampleClient\Request;

class RequestPostComment extends AbstractRequest
{
    protected string $method = self::TYPE_METHOD_POST;

    protected function getUrl(): string
    {
        return "comment";
    }

}