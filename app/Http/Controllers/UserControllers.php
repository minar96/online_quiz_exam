<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validatio data
         $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6',
            'occupation' => 'required',
            'address' => 'required',
            'phone' => 'required|min:11',
        ]);

       //user create
         $user =  new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->occupation = $request->occupation;
         $user->address = $request->address;
         $user->phone = $request->phone;
         $user->is_admin = 0;
         $user->save();
         return redirect()->route('user.index')->with('message', 'user create successfully');
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
        $user = User::find($id);
        return view('backend.pages.user.edit', compact('user'));
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
        $user =  User::find($id);
       //validatio data
         $request->validate([
            'name' => 'required|max:50',
            'password' => 'nullable|min:6',
            'occupation' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable|min:11',
        ]);
         $user->name = $request->name;
          if ($request->password) {
           $user->password = Hash::make($request->password);
         }
         $user->occupation = $request->occupation;
         $user->address = $request->address;
         $user->phone = $request->phone;
         
         
         $user->save();
         return redirect()->route('user.index')->with('message', 'user create successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // login user cannot delete yourself
        // if (auth()->user()->id == $id) {
        //     return redirect()->back()->with('message', 'you can not delete yourself');
        // }

        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return redirect()->route('user.index')->with('message', 'user create successfully');
    }
}
