<?php

namespace Ivanb\ExampleClient\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Ivanb\ExampleClient\Option\Interface\IOptionRequestParameters;
use Ivanb\ExampleClient\Option\Interface\IOptions;
use Ivanb\ExampleClient\Response\ResponseObject;

abstract class AbstractRequest
{
    const TYPE_METHOD_GET = "GET";
    const TYPE_METHOD_POST = "POST";
    const TYPE_METHOD_PUT = "PUT";
    protected Client $client;
    protected IOptions $optionsData;
    protected string $baseUrl = "http://example.com/";
    protected string $method = self::TYPE_METHOD_GET;

    public function __construct(IOptions|IOptionRequestParameters $optionsData, ?Client $client = null)
    {
        $this->client = $client ?? new Client();
        $this->optionsData = $optionsData;
    }

    /**
     * @param IOptions $optionsDTO
     * @return ResponseObject
     * @throws GuzzleException
     */
    public static function execute(IOptions $optionsDTO): ResponseObject
    {
        $class = new static($optionsDTO);
        return $class->request();
    }

    /**
     * @return ResponseObject
     * @throws GuzzleException
     */
    public function request(): ResponseObject
    {
        return new ResponseObject($this->client->request($this->method, $this->baseUrl . $this->getUrl(), $this->optionsData->getOptions()));
    }

    /**
     * @return string
     */
    abstract protected function getUrl(): string;

}