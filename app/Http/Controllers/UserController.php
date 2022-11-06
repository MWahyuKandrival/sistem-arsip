<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',[
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'nip' => 'required|min:5|max:255|unique:users',
            'email' => 'required|min:5|max:255|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/user')->with('success', 'Pendaftaran Akun berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|regex:/\w*/|max:255|unique:users,username,'.$user->id,
            'name' => 'required|string|max:255',
            'nip' => 'required|min:5|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        User::where('id', $user->id)->update($validatedData);

        return redirect('/user')->with('success', 'Perubahan Akun berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        
        return redirect('/user')->with('success', 'User has been deleted');
    }
}
