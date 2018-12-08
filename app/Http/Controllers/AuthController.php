<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        die('xxx');
        $http = new Client;
        // so no posting with login credentials to the login method, or
        // here be dragons and we'll just get a timeout :)
        try {
            $response = $http->post('http://127.0.0.1:8000/oauth/token', [
                'form_params' => [
                    'grant_type'    => 'password',
                    'client_id'     => 2,
                    'client_secret' => 'ZfGuC6SiauJvP8cshdsXRxUfykoS6ODZtx2aW14Z',
                    'username'      => $request->username,
                    'password'      => $request->password
                ]
            ]);
            var_dump($response);
            die;

            return $response->getBody();
        } catch (BadResponseException $e) {
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
