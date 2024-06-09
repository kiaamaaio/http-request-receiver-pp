<?php

namespace HttpRequestReceiver\Http\Response;

class HttpResponse implements HttpResponseInterface
{
    private int $statusCode;

    public function __construct(int $status_code)
    {
        $this->statusCode = $status_code;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
