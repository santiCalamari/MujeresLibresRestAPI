<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    /**
     * Show form login web
     *
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return Redirect::to('/');
        }
        return View::make('web.layouts.login');
    }

    /**
     * Show form register web
     *
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return Redirect::to('/');
        }
        return View::make('web.layouts.register');
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//                    'nickname' => 'required',
//                    'password' => 'required',
//                    'c_password' => 'required|same:password',
//        ]);
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()], 401);
//        }
//        $input = $request->all();
//        $input['password'] = bcrypt($input['password']);
//        $user = User::create($input);
//        $success['token'] = $user->createToken('MyApp')->accessToken;
//        $success['id'] = $user->id;
//        $success['rolId'] = $user->rol_id;
//        return response()->json($success, $this->successStatus);
    }

    /**
     * login web
     *
     */
    public function login()
    {
        $userdata = array(
            'nickname' => Input::get('username'), //scalamari2
            'password' => Input::get('password')  //yipKeFmc
        );
        if (Auth::attempt($userdata, Input::get('remember-me', 0))) {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('/');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('iniciar-sesion')
                ->with('mensaje_error', 'Tus datos son incorrectos')
                ->withInput();
    }

    /**
     * logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/')
                ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
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
    public function voluntario()
    {
        //    $user = User::where('id', $user_id)->get()->toArray();
        $user = Auth::user();
        $user->es_voluntario = true;
        $user->save();
        return response()->json($user, 200);
    }

    public function actualizarUsuario(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function recuperarPassword(Request $request)
    {
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
