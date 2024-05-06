<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController ;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
// use Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json(['error'=> 'Validation Error.', 'message' => $validator->errors], 401);
            // return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken('MyApp')->plainTextToken;
        // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        // $success['name'] =  $user->name;

        return response()->json(['success'=> true, 'token'=> $token, 'name'=> $user->name], 200);
        // return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['error'=> 'Validation Error.', 'message' => $validator->errors()], 401);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;
            // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            // $success['name'] =  $user->name;

            return response()->json(['success'=> true, 'token'=> $token, 'name'=> $user->name], 200);
            // return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return response()->json(['error'=> 'Unauthorised.', 'message' => 'Invalid credentials'], 401);
            // return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
