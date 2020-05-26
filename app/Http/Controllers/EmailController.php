<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Mail;
use App\User;
use Redirect,Response,DB,Config;
use Flash;
use App\Models\Admission;
use Validator;
class EmailController extends Controller
{
   public function index()
   {
    
   $teachers=Teacher::all();
   $parents=Admission::all();
    return view('email',compact('teachers','parents'));
   }


   public function sendEmail(Request $request) 
   {

    $validator = Validator::make($request->all(), [
      'role'=>'required',
      'subject'=>'required',
      'body'=>'required',
      
  ]);
  
  if($validator->fails()) {
    Flash::error('validation error');
    return back();
      
  }else
  {

    if($request->input('role')=='2')
    {

     $user=User::where('id','=',$request->input('emailteacher'))->get();
    }
    else
    {
      $user=User::where('id','=',$request->input('emailparent'))->get();
    }
       $data['body'] = $request->input('body');
       $data['title']=$request->input('subject');
       $data['to']=$user->first()->name;

       Mail::send('email2', $data, function($message) use($user,$request) {

           $message->to($user->first()->email, $user->first()->name)

                   ->subject($request->input('subject'));
       });

       if (Mail::failures()) 
       {
            Flash::error('mail cant be sent');
            return back();
        }
        else
        {
              Flash::success('mail sent successfully');
              return back();
        }
   }
  }

}
