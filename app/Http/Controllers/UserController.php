<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('vendor.adminlte.layouts.Portal.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.adminlte.layouts.Portal.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'user_type' => ['required', 'in:T,C,A,P,S'],
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        alert()->success('Usuário cadastrado com sucesso', 'Sucesso');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('vendor.adminlte.layouts.Portal.Users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$id, 'max:255'],
            'user_type' => ['required', 'in:T,C,A,P,S'],
            'password' => [ 'nullable', 'string', 'min:6', 'max:255', 'confirmed']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.edit', [$id])
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        if (trim($request->input('password')) !== '') {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        alert()->success('Usuário atualizado com sucesso', 'Sucesso');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user !== null) {
            $user->delete();
            alert()->success('Usuário apagado com sucesso', 'Sucesso');
            return redirect()->route('user.index');
        }

        error()->warning('Usuário não encontrado', 'Atenção');
        return redirect()->route('user.index');
    }
}
