<?php
namespace App\Http\Controllers\Api\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UserRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Repositories\User\UserInterface;

class AuthController extends Controller 
{
    public $successStatus = 200;
    public $unauthorizedStatus = 401;
    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
    }
    public function login(Request $request){
        $this->validateLogin($request);
        if (!Auth::attempt( request(['email', 'password']) )) {
            return $this->unauthorized();
        }
        $user = Auth::user();
        $tokenResult =  $user->createToken('AppName');

        $user['token'] =  $tokenResult->accessToken;
        $user['token_type'] =  'Bearer';
        $user['expires_at'] = Carbon::parse($tokenResult->token->expires_at)
                                ->toDateTimeString();
        $success = $this->userRepository->getOneForLogin($user);

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function logout( Request $request ) {
        $request->user()->token()->revoke();
        return response()->json(['message' =>'session was closed']);
    }
    public function getUser() {
        $user = Auth::user();
        $success = $this->userRepository->getOne($user);
        return response()->json(['success' => $success], $this->successStatus);
    }
    public function unauthorized() { 
        return response()->json(['message' =>"unauthorized"], $this->unauthorizedStatus); 
    }
}