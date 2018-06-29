<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CURDController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkAdmin();
        $users= User::orderBy('id','DESC')->paginate(5);
        return view('dashboard.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
            
    }

    
    /**
     * Show the form for creating new Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkAdmin();
        return view('dashboard.create');
    }


    /**
     * Store the user in Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkAdmin();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        $user=$this->insert($request->all());
        return redirect()->route('dashboard.index')
                        ->with('success','Product created successfully');
    }


    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkAdmin();
        $user= User::find($id);
        return view('dashboard.show',compact('user'));
    }


    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkAdmin();
        $user= User::find($id);
        unset($user["password"]);
        return view('dashboard.edit',compact('user'));
    }


    /**
     * Update the chnages for a specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:6',
        ]);
        User::find($id)->update([
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('dashboard.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified user from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkAdmin();
        User::find($id)->delete();
        return redirect()->route('dashboard.index')
                        ->with('success','Product deleted successfully');
    }


    /**
     * Helper function to store user record.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */

    protected function insert(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Validate the user for admin
     *
     */

    protected function checkAdmin()
    {
        if(Auth::check())
            if (Auth::user()->userType != 1) 
                return redirect()->to('/admin')->with('error','Denied Access');
    }

}
