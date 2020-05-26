<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Role;
use App\Models\Admission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use File;
use App\VerifyUser;
use Mail;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'telephone'=>'required',
            'address'=>'required',
            'gender'=>'required',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      dd("123");
        if($data!=null)
    {

        
       $user= User::create([
            'name' => $data['firstname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);
        $user->role=3;
        $user->save();

        $admission=new Admission();
        $admission->dob=$data['dob'];
        $admission->firstname=$data['firstname'];
        $admission->lastname=$data['lastname'];
        $admission->telephone=$data['telephone'];
        $admission->address=$data['address'];
        $admission->date_registered= date("Y-m-d");
        $admission->gender=$data['gender'];
        $admission->email=$data['email'];
        $admission->status=1;
        $admission->user_id=$user->id;
        

        if(Request::hasFile('image'))
        {
       
                   $file=Request::file('image');
                   $extension=$file->getClientOriginalExtension();
                   $filename=Str::random(5).'.'.$extension;
                   $path = storage_path('students/'.$user->id);
                   File::makeDirectory($path, $mode = 777, true, true);
                   $file->move($path,$filename);
                   $admission->image=$filename;

        }
        $admission->save();

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
          \Mail::to($user->email)->send(new VerifyMail($user));
        



        return $user;
    }

  
    }



                public function verifyUser($token)
                {
                $verifyUser = VerifyUser::where('token', $token)->first();
                if(isset($verifyUser) ){
                    $user = $verifyUser->user;
                    if(!$user->verified) {
                    $verifyUser->user->verified = 1;
                    $verifyUser->user->save();
                    $status = "Your e-mail is verified. You can now login.";
                    } 
                    
                    else 
                    
                    
                    {
                    $status = "Your e-mail is already verified. You can now login.";
                    }
                } else {
                    return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
                }
                return redirect('/login')->with(['status' =>  $status]);
                }


                protected function registered($user)
                    {
                    $this->guard()->logout();
                    return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
                    }


             


   
}
