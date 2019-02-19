<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller {

    public $successStatus = 200;

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
                    'nickname' => 'required',
                    'password' => 'required',
                    'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['nickname'] = $user->nickname;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login() {
        if (request('nickname') == null) {
            return response()->json(['error' => 'Unauthoriseddddd'], 401);
        }
        if (Auth::attempt(['nickname' => request('nickname'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorisedddd'], 401);
        }
    }

    /**
     * logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout() {
        $user = Auth::user();
        $user->AauthAcessToken()->delete();
        return response()->json('Sesion finalizada', 201);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    /**
     * changePassword api
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request) {
        $data = $request->all();
        if ($data['oldPassword'] !== $data['c_oldPassword']) {
            return response()->json("Las contrasena no coinciden", 500);
        }
        if (isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !== 'undefined') {
                $user = Auth::user();
                $user->password = bcrypt($data['newPassword']);
                $user->AauthAcessToken()->delete();
                $success['token'] = $user->createToken('MyApp')->accessToken;
                $user->save();
                return response()->json(['success' => $success], $this->successStatus);
        }
        return response()->json("Error al cambiar la contrasena", 500);
    }

}
