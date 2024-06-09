<?php

namespace HttpRequestReceiver\Core;

class Config implements ConfigInterface
{
    private const array CONFIG_FILES = [
        'data' => __DIR__ . '/../../config/data.ini'
    ];

    public function data(string $key): ?string
    {
        return (parse_ini_file(self::CONFIG_FILES['data']))[$key] ?? null;
    }
}
