<?php

namespace HttpRequestReceiver\Core;

interface ConfigInterface
{
    public function data(string $key): ?string;
}
