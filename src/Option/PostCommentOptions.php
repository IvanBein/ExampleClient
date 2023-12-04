<?php

namespace Ivanb\ExampleClient\Option;

use AllowDynamicProperties;
use Ivanb\ExampleClient\Option\Interface\IOptionBody;
use Ivanb\ExampleClient\Option\Interface\IOptions;
use Ivanb\ExampleClient\RequestData\AddCommentRequestData;
use Ivanb\ExampleClient\RequestData\AbstractRequestData;

#[AllowDynamicProperties]
class PostCommentOptions extends AbstractOptions implements IOptions, IOptionBody
{
    public function __construct(AddCommentRequestData $data)
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
}