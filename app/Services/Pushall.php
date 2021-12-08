<?php

namespace App\Services;

class Pushall
{
    private $id;
    private $apiKey;
    private $url = "https://pushall.ru/api.php";

    public function __construct($apiKey, $id)
    {
        $this->apiKey = $apiKey;
        $this->id = $id;
    }

    public function send($article)
    {
        $data = [
            'type' => 'self',
            'id' => $this->id,
            'key' => $this->apiKey,
            'text' => $article->title,
            'title' => 'Новая статья!'
        ];

        $client = new \GuzzleHttp\Client(['base_uri' => $this->url]);
        return $client->post('', ['form_params' => $data]);
    }
}
