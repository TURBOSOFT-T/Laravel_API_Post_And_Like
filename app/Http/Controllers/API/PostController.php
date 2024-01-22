<?php

namespace App\Http\Controllers\API;

use App\Models\Post;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\Back\PostRequest;
use App\Http\Requests\Back\UpdatePostRequest as BackUpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends BaseController
{

    public function index()
    {
        $users = Post::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $data = Post::whereId($id)->first();

        if (!$data) {
            return $this->getError('Id not found');
        } else {
            return $this->getResponse($data, 'retourne data id Post');
        }
    }



    public function create(PostRequest $request)
    {

        $data = Post::create(
            $request->all(),
            ['user_id' => auth()->id()]
        );

        return $this->sendResponse($data, 'Post is  creatred succssufly');
    }


    public function like(Request $request, Post $post)
    {
        // Check if the user has already liked the post
        if (!$post->likes()->where('user_id', auth()->user()->id)->exists()) {
            $post->likes()->attach(auth()->user()->id);
            return response()->json(['message' => 'Post liked successfully']);
        }

        return response()->json(['message' => 'You have already liked this post'], 422);
    }





    public function update(PostRequest $request, $id)
    {
        try {
            $data =  Post::findOrFail($id)->update($request->all(), ['user_id' => auth()->id()]);
            return $this->sendResponse($data, 'Post updated succssufly');
        } catch (ModelNotFoundException $exception) {

            return $this->getError('Id not found');
        }
    }

    public function delete($id)
    {

         try {
            $res = Post::findOrFail($id)->delete();
            return $this->sendResponse($res, 'deleted succssufly');
        } catch (ModelNotFoundException $exception) {
            return $this->getError('Id not found');
        }
    }
}