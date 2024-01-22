<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;

class UserController  extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;





    public function AllUsers(Request $request)
    {
        $data = User::all();
        return $this->getResponse($data, "All Users");
    }




 public function detail($id){
        $data = User::whereId($id)->first();

        if (!$data) {
            return $this->getError('Id not found');
        } else {
            return $this->getResponse($data, 'retourne data id');
        }
 }


    public function show($id)
    {
        $user = User::find($id);
   
      return response()->json($user);
    }



}