<?php

namespace Ivanb\ExampleClient\Tests\RequestTest;

use GuzzleHttp\Exception\GuzzleException;
use Ivanb\ExampleClient\Option\PutCommentOptions;
use Ivanb\ExampleClient\Request\RequestPutComment;
use Ivanb\ExampleClient\RequestData\AddCommentRequestData;
use Ivanb\ExampleClient\RequestData\UpdateCommentRequestData;
use Ivanb\ExampleClient\Tests\RequestTest\DataDTO\RequestDataDTO;
use PHPUnit\Framework\MockObject\Exception;

class RequestPutCommentTest extends AbstractRequestTest
{
    /**
     * @return RequestDataDTO[]
     */
    public static function providerRequest(): array
    {
        $oneDTO = new RequestDataDTO();
        $data = new UpdateCommentRequestData();
        $data->setId(1);
        $data->setName('Test2');
        $data->setText('Oh, there are unrepeated words,
                Who ever said wasted more than he should.
                Inexhaustible only is the blue
                Of sky and generosity of God. '
        );
        $oneDTO->setRequestData($data);
        $oneDTO->setCheckOptions([
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => null
            ],
            'body' => [
                'name' => 'Test2',
                'text' => 'Oh, there are unrepeated words,
                Who ever said wasted more than he should.
                Inexhaustible only is the blue
                Of sky and generosity of God. '
            ],
        ]);
        $oneDTO->setMockContents('{"id": 1}');
        $oneDTO->setCheckContents([
            "id" => 1
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
        $optionsClass = new PutCommentOptions($DTO->getRequestData());
        $this->assertEquals($DTO->getCheckOptions(), $optionsClass->getOptions());

        $mockGuzzleClient = $this->getMockGuzzleClient($DTO->getMockContents(), $DTO->getStatusCode());

        // Инциализируем класс отвечающий за отправку запроса и вызываем метод отправки запроса
        $requestClass = new RequestPutComment($optionsClass, $mockGuzzleClient);
        $this->checkRequest($requestClass, $DTO);
    }

}