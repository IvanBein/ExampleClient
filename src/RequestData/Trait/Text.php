<?php

namespace Ivanb\ExampleClient\RequestData\Trait;

trait Text
{
    protected ?string $text;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;
        return $this;
    }

}