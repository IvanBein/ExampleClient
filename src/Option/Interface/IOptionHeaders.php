<?php

namespace Ivanb\ExampleClient\Option\Interface;

use Ivanb\ExampleClient\RequestData\AbstractRequestData;
use Ivanb\ExampleClient\RequestData\Interface\IRequestData;

interface IOptionHeaders
{
    function getHeaders(): array;

}