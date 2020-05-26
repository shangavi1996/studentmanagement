<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Admission;
use App\User;
use Auth;
use App\Advertisement;
use App\StudyMaterial;
use Illuminate\Hashing\BcryptHasher;
use Validator;
class UserController extends AppBaseController

{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

  

    public function showwelcome()
    {
        $adimgs=Advertisement::all();
        return view('welcome',compact('adimgs'));
    }

    public function admin_register(Request $request)
    {
  
      $validator = Validator::make($request->all(), [
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'firstname'=>'required'
      ]);
  
      if ($validator->fails()) {
          return back()
                      ->withErrors($validator)
                      ->withInput();
      }
      else
      {
          $user= User::create([
              'name' => $request->input('firstname'),
              'email' => $request->input('email'),
              'password' => Hash::make($request->input('password')),
              'verified'=>1,
              'role'=>1,
              
          ]);
  
          return view('auth.login');
      }
     
  
    }

   


}


