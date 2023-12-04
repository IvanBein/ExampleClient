<?php

namespace Ivanb\ExampleClient\Option;

use AllowDynamicProperties;
use Ivanb\ExampleClient\Option\Interface\IOptions;
use Ivanb\ExampleClient\RequestData\AbstractRequestData;
use Ivanb\ExampleClient\RequestData\GetCommentsRequestData;

#[AllowDynamicProperties]
class GetCommentsOptions extends AbstractOptions implements IOptions
{
    public function __construct(GetCommentsRequestData $data)
    {
        $this->data = $data;
    }

    public function getOptions(): array
    {
        $options['headers'] = $this->getHeaders();
        return $options;
    }

}