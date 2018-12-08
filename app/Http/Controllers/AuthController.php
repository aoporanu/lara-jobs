<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        // so no posting with login credentials to the login method, or
        // here be dragons and we'll just get a timeout :)
        try {
            $response = $http->request('POST', config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type'    => 'password',
                    'client_id'     => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'scope'         => '',
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

    public function logout(Request $request)
    {
        $value = $request->bearerToken();

        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();

        $response = 'You have been succesfully logged-out';
        return response($response, 200);
    }
}
