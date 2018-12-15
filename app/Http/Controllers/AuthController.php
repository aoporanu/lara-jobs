<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $http = new \GuzzleHttp\Client;
        // apparently for guzzlehttp to work we must point at localhost?
        try {
            $response = $http->request('POST', config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type'    => 'password',
                    'client_id'     => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username'      => $request->username,
                    'password'      => $request->password
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            if($e->getCode() == 400) {
                return response()->json('Invalid Request. Please enter a username or a password ', $e->getCode());
            }elseif ($e->getCode() == 401) {
                return response()->json('Your credentials are incorrect. Please try again.', $e->getCode());
            }
        }
    }

    public function register(RegisterRequest $request)
    {
        return User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
    }

    public function logout(Request $request)
    {

    }
}
