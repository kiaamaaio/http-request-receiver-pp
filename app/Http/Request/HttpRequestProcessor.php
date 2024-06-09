<?php

namespace HttpRequestReceiver\Http\Request;

use HttpRequestReceiver\Core\ConfigInterface;

abstract class HttpRequestProcessor implements HttpRequestProcessorInterface
{
    protected ConfigInterface $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }
}
