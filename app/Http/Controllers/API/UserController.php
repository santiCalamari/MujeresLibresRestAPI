<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperarPassword;

class UserController extends Controller
{

    public $successStatus = 200;

    public function index($codigo)
    {
        $semilla = 'mujeres-dev';
        if ($semilla == $codigo) {
            return User::all();
        }
        return response()->json($user, 401);
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
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
        $success['id'] = $user->id;
        $success['rolId'] = $user->rol_id;
        return response()->json($success, $this->successStatus);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (request('nickname') == null) {
            return response()->json(['error' => 'Ingrese un usuario'], 401);
        }
        if (request('password') == null) {
            return response()->json(['error' => 'Ingrese una contraseña'], 401);
        }
        if (Auth::attempt(['nickname' => request('nickname'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['id'] = $user->id;
            $success['rolId'] = $user->rol_id;
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'Usuario o contraseña incorrecto.'], 401);
        }
    }

    /**
     * logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $user = Auth::user();
        $user->AauthAcessToken()->delete();
        return response()->json('Sesion finalizada', 201);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return User::where('id', $user->id)->get();
    }

    /**
     * changePassword api
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $data = $request->all();
        if ($data['newPassword'] !== $data['newPassword_c']) {
            return response()->json("Las contrasena no coinciden", 500);
        }
        if (isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !== 'undefined') {
            if (Auth::attempt(['nickname' => request('nickname'), 'password' => request('oldPassword')])) {
                $user = Auth::user();
                $user->password = bcrypt($data['newPassword']);
                $user->AauthAcessToken()->delete();
                $success['id'] = $user->id;
                $success['rolId'] = $user->rol_id;
                $success['token'] = $user->createToken('MyApp')->accessToken;
                $user->save();
                return response()->json($success, $this->successStatus);
            }
        }
        return response()->json("Error al cambiar la contrasena", 500);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function voluntario($user_id, $codigo_evento)
    {
        $user = Auth::user();
        if ($user->id != $user_id) {
            return response()->json($user, 401);
        }

        if (!in_array($codigo_evento, array("00", "01", "02", "03", "04", "05"))) {
            return response()->json($user, 400);
        }

        if ($codigo_evento == "00") {
            $codigo_evento = null;
        }

        $user->es_voluntario = true;
        $user->codigo_evento = $codigo_evento;
        $user->save();
        return response()->json($user, 200);
    }

    public function actualizarUsuario(Request $request, User $user)
    {
        $usuario = Auth::user();
        if ($usuario->id != $user->id) {
            return response()->json($user, 401);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function recuperarPassword(Request $request)
    {
        if ($request->input('email') == null) {
            return response()->json(['error' => 'Ingrese un email'], 401);
        }
        if ($request->input('email_c') == null) {
            return response()->json(['error' => 'Ingrese por segunda vez un email'], 401);
        }
        $email = $request->input('email');
        $email_c = $request->input('email_c');
        if ($email != $email_c) {
            return response()->json("Los correos ingresados no coinciden", 401);
        }
        try {
            $password = str_random(8);
            $user = Auth::user();
            $user->password = bcrypt($password);
            $user->save();
            $obj = new \stdClass();
            $obj->nickname = $user->nickname;
            $obj->password = $password;
            Mail::to($email)->send(new recuperarPassword($obj));
            return response()->json("Se ha enviado un correo electronico con la nueva contraseña.");
        } catch (Exception $ex) {
            return response()->json("Hubo un erro al resetear la nueva contraseña. Intente nuevamente mas tarde!", 401);
        }
    }
}
