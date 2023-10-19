<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, User $user)
    {

        if($request->isMethod('post')){
            $user = User::where('name', 'LIKE', '%'.$request->name.'%')->withTrashed()->get();
        }else{
            $user = User::all();
        }
        
        return view('users.user', compact('user'));
    }


    public function edit(User $id)
    {
        // dd($user);

        $user = $id;

        return view('users.edituser', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        
    }


    public function destroy(User $user)
    {
        $user = User::where('id', $user)->delete();

        return redirect()->route('lojista.history')->with('success', 'Usuário excluido com sucesso!');
    }
}
