<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResponse($data, $message)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response, Response::HTTP_OK);
    }

     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($data, $message)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message)
    {
    	$response = [
            'success' => false,
            'message' => $message,
        ];
        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }

     /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function getError($message)
    {
    	$response = [
            'success' => false,
            'message' =>  $message
        ];
        return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}