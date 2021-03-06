<?php


namespace App\Http\Controllers\Api;

use JWTAuth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function username()
    {
        return 'username';
    }

    public function accessToken(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);

//        return response()->json(['token' => $token]);
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');

        if($data['username']) {
            $usernameKey = $this->usernameKey();

            $data[$usernameKey] = $data[$this->username()];
            unset($data[$this->username()]);

            return $data;
        }
        return $this->sendFailedLoginResponse($request);
    }

    private function usernameKey()
    {
        $username = \Request::get($this->username());

        $validator = \Validator::make([
            'cpf' => $username
        ], ['cpf' => 'cpf']);

        return $validator->fails() ? 'Email' : 'CPF';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
}
