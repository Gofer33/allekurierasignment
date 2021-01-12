<?php

namespace App\Http\Controllers;

use App\Interfaces\HandlerInterface;

class PostController extends Controller
{
    private $service;

    public function __construct(HandlerInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAllPosts();
    }

    public function show($id)
    {
        $post = $this->service->getPost($id);
        return $post->toJson();
    }
}
