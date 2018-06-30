<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    

    /**
     * Show admin Login Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return view('home');        
    }

    
    /**
     * API Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response JWtoken
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $user=User::where('email',$request->email) -> first();
        
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_email_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        if($user->userType == 1){
            return response()->json(compact('token'));
        }else
            return response()->json(['acess_denide'], 422);
    }


     /**
     * Amin Login into the system using form.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function loginUsingForm(Request $request){
        $credentials = $request->only('email', 'password');
        $user=User::where('email',$request->email) -> first();
        if($request->type=='dashboad')
        {
            if (Auth::attempt($credentials)) {
                
                if($user->userType == 1){
                    Auth::loginUsingId($user->id, true);
                    return redirect('dashboard');
                }else
                    return redirect('/admin')->with('error','Acess Denide');
                
            }else{
                return redirect('/admin')->with('error','Worng Credentials');
            }
        }
    }


    /**
     * retuen detail about the user for which token is assign.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response user deatil
     */
    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }


    /**
     * Logout Form the system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        Auth::logout();
        return redirect('/admin')->with('success','Logout successfully');
    }

}
