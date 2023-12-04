<?php

namespace Ivanb\ExampleClient\RequestData;

use Ivanb\ExampleClient\RequestData\Interface\IRequestData;

abstract class AbstractRequestData implements IRequestData
{
    protected ?string $authToken = null;

    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    public function setAuthToken(?string $authToken): static
    {
        $this->authToken = $authToken;
        return $this;
    }
}