<?php

namespace Ivanb\ExampleClient\Tests\RequestTest\DataDTO;

use Ivanb\ExampleClient\RequestData\AddCommentRequestData;
use Ivanb\ExampleClient\RequestData\GetCommentsRequestData;
use Ivanb\ExampleClient\RequestData\UpdateCommentRequestData;

class RequestDataDTO
{
    private GetCommentsRequestData|AddCommentRequestData|UpdateCommentRequestData $requestData;

    /**
     * Шаблон для проверки уже сформированных опций
     * @var array
     */
    private array $checkOptions;

    /**
     * Данные которые должен будет вернуть метод в результате выполнения request в теле запроса
     * @var string
     */
    private string $mockContents;

    /**
     * Шаблон для проверки правильности тела запроса уже полученно из класса обертки
     * @var array
     */
    private array $checkContents;

    /**
     * Статус код, который должен придти
     * @var string
     */
    private string $statusCode;

    public function getRequestData(): AddCommentRequestData|GetCommentsRequestData|UpdateCommentRequestData
    {
        return $this->requestData;
    }

    public function setRequestData(AddCommentRequestData|GetCommentsRequestData|UpdateCommentRequestData $requestData): RequestDataDTO
    {
        $this->requestData = $requestData;
        return $this;
    }

    public function getCheckOptions(): array
    {
        return $this->checkOptions;
    }

    public function setCheckOptions(array $checkOptions): RequestDataDTO
    {
        $this->checkOptions = $checkOptions;
        return $this;
    }

    public function getMockContents(): string
    {
        return $this->mockContents;
    }

    public function setMockContents(string $mockContents): RequestDataDTO
    {
        $this->mockContents = $mockContents;
        return $this;
    }

    public function getCheckContents(): array
    {
        return $this->checkContents;
    }

    public function setCheckContents(array $checkContents): RequestDataDTO
    {
        $this->checkContents = $checkContents;
        return $this;
    }

    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    public function setStatusCode(string $statusCode): RequestDataDTO
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}