<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


    public function update(Request $request, $id)
    {   
        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        Hash::make($request->password);

        $user->save();

        return redirect()->route('users.user')->with('Usuário atualizado!');
        
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();

        return redirect()->route('users.user')->with('success', 'Usuário excluido com sucesso!');
    }
}
