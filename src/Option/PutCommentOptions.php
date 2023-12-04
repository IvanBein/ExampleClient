<?php

namespace Ivanb\ExampleClient\Option;

use AllowDynamicProperties;
use Ivanb\ExampleClient\Option\Interface\IOptionBody;
use Ivanb\ExampleClient\Option\Interface\IOptionRequestParameters;
use Ivanb\ExampleClient\Option\Interface\IOptions;
use Ivanb\ExampleClient\RequestData\AbstractRequestData;
use Ivanb\ExampleClient\RequestData\UpdateCommentRequestData;
#[AllowDynamicProperties]
class PutCommentOptions extends AbstractOptions implements IOptions, IOptionBody, IOptionRequestParameters
{
    public function __construct(UpdateCommentRequestData $data)
    {
        $this->data = $data;
    }

    public function getOptions(): array
    {
        $options['headers'] = $this->getHeaders();
        $options['body'] = $this->getBody();
        return $options;
    }

    public function getBody(): array
    {
        return [
            'name' => $this->data->getName(),
            'text' => $this->data->getText()
        ];
    }

    public function getRequestParameters(): string
    {
        return '/' . $this->data->getId();
    }
}