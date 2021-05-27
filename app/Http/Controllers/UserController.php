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
        $users = User::latest()->paginate(5);
    
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'users_phone' => 'required',
        //     'users_idcard' => 'required',
        //     'role' => 'required',
        // ]);
        // // dd($request);
        // User::create($request->all());

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->users_phone = $request->users_phone;
        $user->users_idcard = $request->users_idcard;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')
                        ->with('success','เพิ่มข้อมูลเรียบร้อยแล้ว.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->users_phone = $request->users_phone;
        $user->users_idcard = $request->users_idcard;
        $user->role = $request->role;
        $user->save();
    
        return redirect()->route('users.index')
                        ->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('success','ลบข้อมูลคนไข้เรียบร้อยแล้ว');
    }
}