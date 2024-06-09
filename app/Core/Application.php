<?php

namespace HttpRequestReceiver\Core;

use HttpRequestReceiver\Exception\NotFoundException;

class Application
{
    public function run(): void
    {
        try {
            $config = new Config();
            $http_response = (new ((new Router())->getProcessorClass($_SERVER['REQUEST_METHOD']))($config))->process();
            http_response_code($http_response->getStatusCode());
        } catch (NotFoundException) {
            http_response_code(404);
        } catch (\Exception) {
            http_response_code(500);
        }
    }
}
