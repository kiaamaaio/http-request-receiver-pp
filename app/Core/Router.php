<?php

namespace HttpRequestReceiver\Core;

use HttpRequestReceiver\Exception\NotFoundException;
use HttpRequestReceiver\Http\Request\PostRequestProcessor;
use HttpRequestReceiver\Http\Request\PutRequestProcessor;

class Router
{
    private const array PROCESSOR_CLASSES = [
        'POST' => PostRequestProcessor::class,
        'PUT' => PutRequestProcessor::class
    ];

    public function getProcessorClass(string $request_method): string
    {
        return self::PROCESSOR_CLASSES[$request_method] ?? throw new NotFoundException();
    }
}
