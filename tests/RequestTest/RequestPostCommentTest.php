<?php

namespace Ivanb\ExampleClient\Tests\RequestTest;

use GuzzleHttp\Exception\GuzzleException;
use Ivanb\ExampleClient\Option\PostCommentOptions;
use Ivanb\ExampleClient\Request\RequestPostComment;
use Ivanb\ExampleClient\RequestData\AddCommentRequestData;
use Ivanb\ExampleClient\Tests\RequestTest\DataDTO\RequestDataDTO;
use PHPUnit\Framework\MockObject\Exception;

class RequestPostCommentTest extends AbstractRequestTest
{
    /**
     * @return RequestDataDTO[]
     */
    public static function providerRequest(): array
    {
        $oneDTO = new RequestDataDTO();
        $data = new AddCommentRequestData();
        $data->setName('Test');
        $data->setText('New Year’s Day, a happy day! 
               We are glad and want to play.
               We all dance and sing and say,
               «Welcome! Welcome, New Year’s Day!» '
        );
        $oneDTO->setRequestData($data);
        $oneDTO->setCheckOptions([
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => null
            ],
            'body' => [
                'name' => 'Test',
                'text' =>'New Year’s Day, a happy day! 
               We are glad and want to play.
               We all dance and sing and say,
               «Welcome! Welcome, New Year’s Day!» '
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
        $optionsClass = new PostCommentOptions($DTO->getRequestData());
        $this->assertEquals($DTO->getCheckOptions(), $optionsClass->getOptions());

        $mockGuzzleClient = $this->getMockGuzzleClient($DTO->getMockContents(), $DTO->getStatusCode());

        // Инциализируем класс отвечающий за отправку запроса и вызываем метод отправки запроса
        $requestClass = new RequestPostComment($optionsClass, $mockGuzzleClient);
        $this->checkRequest($requestClass, $DTO);
    }

}