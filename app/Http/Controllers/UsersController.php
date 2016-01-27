<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect; 
use View;
use Validator;
use Auth;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    public function login()
    {
 /*           $data = Input::only(['email', 'password']);

            $validator = Validator::make(
            $data,
            [
                'email' => 'required|email|min:8',
                'password' => 'required',
            ]
        );

        if($validator->fails()){
            return Redirect::route('user.login')->withErrors($validator)->withInput();
        }*/
        return View::make('users.login');
    }

    public function handleLogin()
    {
       $data = Input::only(['email', 'password']);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return Redirect::to('profile');
        }
        else{
        $rules = [
           'email'                            => 'email|required',
           'password'                      => 'required',
        ];
         $messages = array(
        'required' => 'The :attribute is required.'
    );
        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            //return Redirect::route('login')->withErrors($validator)->withInput();
              return Redirect::route('login')->withInput(Input::except('password'))->withErrors($validator);
        }
    }
    }

    public function profile()
    {
       return View::make('users.profile');
    }
    
    public function logout()
    {
        if(Auth::check()){
          Auth::logout();
        }
         return Redirect::route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //$data = Input::only(['first_name','last_name','email','password', 'password_confirmation']);
 
        /*$validator = Validator::make(
            $data,
            [
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:2',
                'email' => 'required|email|min:5',
                'password' => 'required|min:5|confirmed',
                'password_confirmation'=> 'required|min:5'
            ]
        );*/

        $data = $request->except('_token');

        $rules = [
           'first_name'                     => 'required',
           'last_name'                     => 'required',
           'email'                            => 'email|required|unique:users,email',
           'password'                      => 'required|confirmed',
           'password_confirmation'  => 'required'
        ];
         $messages = array(
        'required' => 'The :attribute is really really really important.',
        'confirmed'  => 'Password does not match.',
        'unique'        => 'Existing Email..'
    );
        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('user.create')->withErrors($validator)->withInput();
        }
        else{
   /*         $pa= Input::get(['password']);
            $hashed = Hash::make($pa);
            $data = Input::only(['first_name','last_name','email','hashed']); */
        //$data = Input::only(['first_name','last_name','email','password', 'password_confirmation']);   
        $data['password'] = bcrypt($data['password']); 
        unset($data['password_confirmation']);
        $newUser = User::create($data);
        if($newUser){
            Auth::login($newUser);
            return Redirect::to('profile');
        }

        return Redirect::route('user.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
