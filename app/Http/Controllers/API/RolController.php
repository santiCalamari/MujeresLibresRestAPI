<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rol;
use Illuminate\Support\Facades\Auth;
use Validator;

class RolController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return Rol::all();
//    }

    public function show(Rol $rol)
    {
        return $rol;
    }
//    public function store(Request $request) {
//        $rol = Rol::create($request->all());
//        return response()->json($rol, 201);
//    }
//    public function update(Request $request, Rol $rol) {
//        $rol->update($request->all());
//        return response()->json($rol, 200);
//    }
//    public function delete(Rol $rol) {
//        $rol->delete();
//        return response()->json('Rol eliminada', 204);
//    }  
}
