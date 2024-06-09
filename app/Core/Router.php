<?php

namespace HttpRequestReceiver\Core;

use HttpRequestReceiver\Exception\NotFoundException;
use HttpRequestReceiver\Http\Request\PostRequestProcessor;

class Router
{
    private const array PROCESSOR_CLASSES = [
        'POST' => PostRequestProcessor::class
    ];

    public function getProcessorClass(string $request_method): string
    {
        return self::PROCESSOR_CLASSES[$request_method] ?? throw new NotFoundException();
    }
}
