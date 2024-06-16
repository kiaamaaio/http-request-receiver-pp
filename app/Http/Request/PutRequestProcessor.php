<?php

namespace HttpRequestReceiver\Http\Request;

use HttpRequestReceiver\Http\Response\HttpResponse;
use HttpRequestReceiver\Http\Response\HttpResponseInterface;

class PutRequestProcessor extends HttpRequestProcessor
{
    private const string DATA_STORE_DIR_PATH_KEY = 'data_store_dir_path';

    public function process(): HttpResponseInterface
    {
        $exploded_request_uri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        unset($exploded_request_uri[0]);
        if (count($exploded_request_uri) === 0) {
            return new HttpResponse(400);
        }
        $file_key = end($exploded_request_uri);
        array_pop($exploded_request_uri);

        $data_store_dir_path = rtrim($this->config->data(self::DATA_STORE_DIR_PATH_KEY), '/');
        $imploded_request_uri = implode('/', $exploded_request_uri);
        if (!file_exists("{$data_store_dir_path}/{$imploded_request_uri}")) {
            mkdir("{$data_store_dir_path}/{$imploded_request_uri}", 0770, true);
        }

        parse_str(file_get_contents('php://input'), $put_request_data);
        $json_encoded_data = json_encode($put_request_data);
        if ($json_encoded_data !== false) {
            file_put_contents(
                "{$data_store_dir_path}/{$imploded_request_uri}/{$file_key}.json",
                $json_encoded_data . PHP_EOL
            );
        } else {
            file_put_contents(
                "{$data_store_dir_path}/{$imploded_request_uri}/{$file_key}.log",
                serialize($put_request_data) . PHP_EOL
            );
        }

        return new HttpResponse(201);
    }
}
