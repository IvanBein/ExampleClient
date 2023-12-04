<?php

namespace Ivanb\ExampleClient\Tests\RequestTest;

use GuzzleHttp\Exception\GuzzleException;
use Ivanb\ExampleClient\Option\GetCommentsOptions;
use Ivanb\ExampleClient\Request\RequestGetComments;
use Ivanb\ExampleClient\RequestData\GetCommentsRequestData;
use Ivanb\ExampleClient\Tests\RequestTest\DataDTO\RequestDataDTO;
use PHPUnit\Framework\MockObject\Exception;

class RequestGetCommentsTest extends AbstractRequestTest
{
    /**
     * @return RequestDataDTO[]
     */
    public static function providerRequest(): array
    {
        $oneDTO = new RequestDataDTO();
        $data = new GetCommentsRequestData();
        $oneDTO->setRequestData($data);
        $oneDTO->setCheckOptions([
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => null
            ]
        ]);
        $oneDTO->setMockContents('
            {
               "list": [
                    {
                        "id": 1,
                        "name": "test",
                        "text": "111111"
                    }, 
                    {
                        "id": 2,
                        "name": "test2",
                        "text": "222222"
                    },
                    {
                        "id": 3,
                        "name": "test3",
                        "text": "333333"
                    } 
                ] 
            }
        ');
        $oneDTO->setCheckContents([
            "list" => [
                [
                    "id" => 1,
                    "name" => "test",
                    "text" => "111111"
                ],
                [
                    "id" => 2,
                    "name" => "test2",
                    "text" => "222222"
                ],
                [
                    "id" => 3,
                    "name" => "test3",
                    "text" => "333333"
                ],
            ]
        ]);

        $oneDTO->setStatusCode(200);

        return [
            [
                $oneDTO
            ]
        ];
    }

    /**
     * @param RequestDataDTO $DTO
     * @return void
     * @throws Exception
     * @throws GuzzleException
     * @dataProvider providerRequest
     */
    public function testRequest(RequestDataDTO $DTO): void
    {
        $optionsClass = new GetCommentsOptions($DTO->getRequestData());
        $this->assertEquals($DTO->getCheckOptions(), $optionsClass->getOptions());

        $mockGuzzleClient = $this->getMockGuzzleClient($DTO->getMockContents(), $DTO->getStatusCode());

        // Инциализируем класс отвечающий за отправку запроса и вызываем метод отправки запроса
        $requestClass = new RequestGetComments($optionsClass, $mockGuzzleClient);
        $this->checkRequest($requestClass, $DTO);
    }

}