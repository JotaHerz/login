<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;

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

    /**
     * list user
     *
     * @param integer $idUser
     * @return \Illuminate\View\View
     */
    public function store(int $idUser): \Illuminate\View\View
    {

        $usuario=User::find ($idUser);
        return view('usuarios.edit_user',compact('usuario'));
    }

    /**
     * edit user
     *
     * @param Request $request
     * @param integer $idUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, int $idUser): \Illuminate\Http\RedirectResponse
    {
        $usuario = User::find($idUser);
        $check = false;
        if ($request->enabled_user)
        {
             $check = true;
        }
        $usuario->update([
            'name' =>$request->name,
            'enabled_user' => $check,
        ]);

        return redirect()->route('admin.users');
    }



}


