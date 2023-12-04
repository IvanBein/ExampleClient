<?php

namespace Ivanb\ExampleClient\Tests\RequestTest;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Ivanb\ExampleClient\Request\AbstractRequest;
use Ivanb\ExampleClient\Tests\RequestTest\DataDTO\RequestDataDTO;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

abstract class AbstractRequestTest extends TestCase
{
    /**
     * @param string $contents
     * @param int|string $statusCode
     * @return MockObject|GuzzleClient
     * @throws Exception
     */
    protected function getMockGuzzleClient(string $contents, int|string $statusCode): MockObject|GuzzleClient
    {
        // Мок streamInterface который возрщается в getBody Guzzle Response
        $mockStreamInterface = $this->createMock(StreamInterface::class);
        $mockStreamInterface->method('getContents')->willReturn($contents);

        // Мок Guzzle Response
        $mockGuzzleResponse = $this->createMock(Response::class);
        $mockGuzzleResponse->method('getHeaders')->willReturn([]);
        $mockGuzzleResponse->method('getStatusCode')->willReturn(200);
        $mockGuzzleResponse->method('getBody')->willReturn($mockStreamInterface);

        // Мок Guzzle Client
        $mockGuzzleClient = $this->createMock(GuzzleClient::class);
        $mockGuzzleClient->method('request')->willReturn($mockGuzzleResponse);
        return $mockGuzzleClient;
    }

    /**
     * @throws GuzzleException
     */
    protected function checkRequest(AbstractRequest $requestClass, RequestDataDTO $DTO): void
    {
        $requestResult = $requestClass->request();

        // Проверяем результат
        $this->assertEquals($DTO->getStatusCode(), $requestResult->getCode());
        $this->assertEquals($DTO->getCheckContents(), $requestResult->getBody());
    }

    /**
     * @param RequestDataDTO $DTO
     * @return void
     * @throws Exception
     * @throws GuzzleException
     * @dataProvider providerRequest
     */
    abstract public function testRequest(RequestDataDTO $DTO): void;

    /**
     * @return RequestDataDTO[]
     */
    abstract public static function providerRequest(): array;

}