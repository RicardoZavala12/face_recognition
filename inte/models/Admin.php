<?php
require_once './config/config.php';

class Admin {
    public static function getAll() {
        $response = file_get_contents(API_URL);
        return json_decode($response, true);
    }

    public static function create($data) {
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents(API_URL, false, $context);
        return json_decode($response, true);
    }

    public static function update($id, $data) {
        $url = API_URL . '/' . $id;
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public static function delete($id) {
        $url = API_URL . '/' . $id;
        $options = [
            'http' => [
                'method'  => 'DELETE',
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}
?>
