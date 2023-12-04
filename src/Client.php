<?php

namespace Ivanb\ExampleClient;

use GuzzleHttp\Exception\GuzzleException;
use Ivanb\ExampleClient\Option\GetCommentsOptions;
use Ivanb\ExampleClient\Option\Interface\IOptionRequestParameters;
use Ivanb\ExampleClient\Option\Interface\IOptions;
use Ivanb\ExampleClient\Option\PostCommentOptions;
use Ivanb\ExampleClient\Option\PutCommentOptions;
use Ivanb\ExampleClient\RequestData\AddCommentRequestData;
use Ivanb\ExampleClient\RequestData\GetCommentsRequestData;
use Ivanb\ExampleClient\RequestData\UpdateCommentRequestData;
use Ivanb\ExampleClient\Request\RequestGetComments;
use Ivanb\ExampleClient\Request\RequestPostComment;
use Ivanb\ExampleClient\Request\RequestPutComment;

class Client
{
    private string $authToken;

    public function __construct(string $authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @throws GuzzleException
     */
    public function getComments(): Response\ResponseObject
    {
        $data = (new GetCommentsRequestData())
            ->setAuthToken($this->authToken);

       return RequestGetComments::execute(new GetCommentsOptions($data));
    }

    /**
     * @throws GuzzleException
     */
    public function addComment(string $name, string $text): Response\ResponseObject
    {
        $data = (new AddCommentRequestData())
            ->setText($text)
            ->setName($name)
            ->setAuthToken($this->authToken);

        return RequestPostComment::execute(new PostCommentOptions($data));
    }

    /**
     * @throws GuzzleException
     */
    public function updateComment(string $id, string $name = null, string $text = null): Response\ResponseObject
    {
        $data = (new UpdateCommentRequestData())
            ->setId($id)
            ->setText($text)
            ->setName($name)
            ->setAuthToken($this->authToken);

        return RequestPutComment::execute(new PutCommentOptions($data));
    }

}