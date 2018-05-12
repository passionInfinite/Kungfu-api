<?php
namespace KungFu;

class Response {

    public static function raw($status = 200, $data = []) {
        $response = [
            'data' => $data,
            'errors' => []
        ];

        return response($response, $status);
    }

    public static function errors($status = 400, $errors = []) {
        $response = [
            'data' => [],
            'errors' => $errors
        ];

        return response($response, $status);
    }
}