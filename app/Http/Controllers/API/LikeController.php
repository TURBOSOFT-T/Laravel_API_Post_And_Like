<?php

namespace App\Http\Controllers\API;

use App\Models\Like;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Beat;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Like::all();
        return response()->json($users);
    }



    public function likePost(Post $post)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $existingLike = Like::where('user_id', $user->id)
            ->where('likeable_id', $post->id)
            ->where('likeable_type', get_class($post))
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'Like removed'], 200);
        }

        $like = new Like();
        $like->user_id = $user->id;
        $post->likes()->save($like);

        return response()->json(['message' => 'Post liked'], 201);
    }





    public function likeBeat(Beat $beat)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $existingLike = Like::where('user_id', $user->id)
            ->where('likeable_id', $beat->id)
            ->where('likeable_type', get_class($beat))
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'Like removed'], 200);
        }

        $like = new Like();
        $like->user_id = $user->id;
        $beat->likes()->save($like);

        return response()->json(['message' => 'Beat liked'], 201);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function delete($id)
    {

        try {
            $res = Like::findOrFail($id)->delete();
            return $this->sendResponse($res, 'deleted succssufly');
        } catch (ModelNotFoundException $exception) {
            return $this->getError('Id not found');
        }
    }




}