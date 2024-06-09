<?php

namespace HttpRequestReceiver\Http\Response;

interface HttpResponseInterface
{
    public function getStatusCode(): int;
}
