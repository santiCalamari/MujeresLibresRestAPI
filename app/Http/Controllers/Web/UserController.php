<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperarPassword;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\SongForm;

class UserController extends Controller
{

    public $successStatus = 200;

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return "register";
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
    public function login(FormBuilder $formBuilder)
    {
        return "login";
        if (request('nickname') == null) {
            /// manejar errores con laravel para verlos en el template
            return response()->json(['error' => 'Ingrese un usuario'], 401);
        }
        if (request('password') == null) {
            return response()->json(['error' => 'Ingrese una contraseña'], 401);
        }
        $form = $formBuilder->create(\App\Forms\LoginForm::class, [
            'method' => 'POST',
            'url' => route('login')
        ]);
        if ($form->isValid()) {
            if (Auth::attempt(['nickname' => request('nickname'), 'password' => request('password')])) {
                $user = Auth::user();
                $success['id'] = $user->id;
                $success['rolId'] = $user->rol_id;
                $success['token'] = $user->createToken('MyApp')->accessToken;
                // todo go to menu principal
                return view('web.layouts.menu_principal', compact('form'));
            } else {
                return redirect()->back()->withErrors($form->getErrors())->withInput();
            }
        }
        return view('web.layouts.login', compact('form'));
    }

    /**
     * logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return "logout";
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
        return "details";
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
        return "changePassword";
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
    public function voluntario()
    {
        return "voluntario";
        //    $user = User::where('id', $user_id)->get()->toArray();
        $user = Auth::user();
        $user->es_voluntario = true;
        $user->save();
        return response()->json($user, 200);
    }

    public function actualizarUsuario(Request $request, User $user)
    {
        return "actualizarUsuario";
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function recuperarPassword(Request $request)
    {
        return "recuperarPassword";
        $email = $request->input('email');
        $email_c = $request->input('email_c');
        if ($email != $email_c) {
            return response()->json("Los correos ingresados no coinciden", 401);
        }
        $password = str_random(8);
        $user = Auth::user();
        $user->password = bcrypt($password);
        $user->save();
        $obj = new \stdClass();
        $obj->nickname = $user->nickname;
        $obj->password = $password;
        Mail::to($email)->send(new recuperarPassword($obj));
        return response()->json("Se ha enviado un correo electronico con la nueva contraseña");
    }
}
