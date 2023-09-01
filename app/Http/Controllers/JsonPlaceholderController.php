<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonPlaceholderService;
use Illuminate\Support\Facades\Validator;

class JsonPlaceholderController extends Controller
{
    protected $jsonPlaceholderService;

    public function __construct(JsonPlaceholderService $jsonPlaceholderService)
    {
        $this->jsonPlaceholderService = $jsonPlaceholderService;
    }

    public function showPosts()
    {
        $posts = $this->jsonPlaceholderService->getPosts();
        return '<pre>' . json_encode($posts, JSON_PRETTY_PRINT) . '</pre>';
    }

    public function showUsers()
    {
        $users = $this->jsonPlaceholderService->getUsers();
        return '<pre>' . json_encode($users, JSON_PRETTY_PRINT) . '</pre>';
    }

    public function showTodos()
    {
        $todos = $this->jsonPlaceholderService->getTodos();
        return '<pre>' . json_encode($todos, JSON_PRETTY_PRINT) . '</pre>';
    }

    public function createPost(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $post = $this->jsonPlaceholderService->managePost(null, $request->all());
        return '<pre>' . json_encode($post, JSON_PRETTY_PRINT) . '</pre>';
    }

    public function updatePost(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $post = $this->jsonPlaceholderService->managePost($id, $request->all());
        return '<pre>' . json_encode($post, JSON_PRETTY_PRINT) . '</pre>';
    }

    public function deletePost($id)
    {
        $result = $this->jsonPlaceholderService->managePost($id, []);
        return '<pre>' . json_encode($result, JSON_PRETTY_PRINT) . '</pre>';
    }
}
