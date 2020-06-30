<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Middleware\RoleMiddleware;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
        $this->middleware('auth')->only('index');
     }




    public function index()
    {
        $users=User::all()->where('id','!=',1);
       return view('admin', compact('users'));
    }

    public function store($idUser)
    {

     $usuario=User::find ($idUser);
        //$user=request()->all();
        return view('usuarios.edit_user',compact('usuario'));
    }

    public function update(Request $request, $idUser)
    {
        $usuario = User::find($idUser);
        $check = false;
        if ($request->enabled_user) {
            $check = true;
        }
        $usuario->update([
            'name' => $request->name,
            'enabled_user' => $check,
        ]);
        return redirect()->route('admin.users');
    }



}


