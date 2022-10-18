<?php
//can be removed if this doesnt work 1/4


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::where ('id', '>', 1)
            ->get();
        return view('adminpage', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $user = Auth::user();
        return view('useredit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\user $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(user $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => ['required', 'unique:users']

        ]);

        $user->name = request('name');
        $user->email = request('email');


        $user->save();

        return redirect('userindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

}

