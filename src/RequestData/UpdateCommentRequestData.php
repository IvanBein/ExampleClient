<?php

namespace Ivanb\ExampleClient\RequestData;

use Ivanb\ExampleClient\RequestData\Trait\ID;
use Ivanb\ExampleClient\RequestData\Trait\Name;
use Ivanb\ExampleClient\RequestData\Trait\Text;

class UpdateCommentRequestData extends AbstractRequestData
{
    use ID, Name, Text;
}