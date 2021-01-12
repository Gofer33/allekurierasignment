<?php

namespace App\Providers;

use App\Interfaces\HandlerInterface;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider implements HandlerInterface
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getPost(int $postId): Post
    {
        $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts/' . $postId);
        $post = new Post((array)json_decode($response->getBody()));
        return $post;
    }

    public function getAllPosts(): array
    {
        $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

        return json_decode($response->getBody());
    }
}
