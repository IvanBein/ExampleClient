<?php

namespace Ivanb\ExampleClient\RequestData;

use Ivanb\ExampleClient\RequestData\Trait\Name;
use Ivanb\ExampleClient\RequestData\Trait\Text;

class AddCommentRequestData extends AbstractRequestData
{
    use Name, Text;
}
