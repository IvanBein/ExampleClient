<?php

namespace Ivanb\ExampleClient\Request;

class RequestGetComments extends AbstractRequest
{
    protected function getUrl(): string
    {
        return "comments";
    }

}