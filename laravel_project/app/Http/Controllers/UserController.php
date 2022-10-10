<?php
//can be removed if this doesnt work 1/4
namespace App\Http\Controllers;

use App\Models\LoggedinUser;
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
        $users = LoggedinUser::all(); //has to be the one currently logged in somehow later

        return view('userindex',compact('users'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        LoggedinUser::create($request->all());

        return redirect()->route('users.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoggedinUser  $user
     * @return \Illuminate\Http\Response
     */
    public function show(LoggedinUser $user)
    {
        return view('show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoggedinUser  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(LoggedinUser $user)
    {
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoggedinUser  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoggedinUser $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoggedinUser  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoggedinUser $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
