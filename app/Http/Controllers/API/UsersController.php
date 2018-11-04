<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public $successStatus = 200;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        if(Auth::attempt(['email' => \request('email'), 'password' => \request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken(config('app.name'))->accessToken;
            $success['user'] = $user;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * @param RegisterFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterFormRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken(config('app.name'))->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
