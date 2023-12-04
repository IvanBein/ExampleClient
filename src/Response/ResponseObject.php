<?php

namespace Ivanb\ExampleClient\Response;

use GuzzleHttp\Psr7\Response;

class ResponseObject
{
    /**
     * HTTP код ответа
     * @var int|string
     */
    protected int|string $code;

    /**
     * Массив заголовков ответа
     * @var array
     */
    protected array $headers;

    /**
     * Тело ответа
     * @var mixed
     */
    protected mixed $body;

    public function __construct(Response $config = null, bool $needDecode = true)
    {
        $this->headers = $config->getHeaders();
        $this->code = $config->getStatusCode();

        $this->body = $needDecode
            ? json_decode($config->getBody()->getContents(), true)
            : $config->getBody()->getContents();
    }

    /**
     * Возвращает массив заголовков ответа
     *
     * @return array Массив заголовков ответа
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Возвращает тело ответа
     *
     * @return mixed Тело ответа
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * Возвращает HTTP код ответа
     *
     * @return int|string HTTP код ответа
     */
    public function getCode(): int|string
    {
        return $this->code;
    }

}