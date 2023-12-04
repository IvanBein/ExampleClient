<?php

namespace Ivanb\ExampleClient\RequestData\Trait;

trait Name
{
    protected ?string $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

}