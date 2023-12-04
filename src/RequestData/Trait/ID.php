<?php

namespace Ivanb\ExampleClient\RequestData\Trait;

use Ivanb\ExampleClient\RequestData\UpdateCommentRequestData;

trait ID
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

}