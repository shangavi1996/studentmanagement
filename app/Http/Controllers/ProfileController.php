<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Models\Admission;
use Str;
use Auth;
use Illuminate\Support\Facades\Hash;
use Flash;
use File;
use App\User;

class ProfileController extends Controller
{
    public function  show_parent_profile()
    {
        
              global $notifications;

              $notices=Notice::where('to','=',3)->get();
                
              if($notices->first()==null)
              {
                $array=123;
                $notifications=null;
                $admission=Admission::where('user_id','=',Auth::user()->id)->get();
                $admission=$admission->first();
                return view('admissions.parent_profile',compact('admission','notifications','array'));
              }

            else
            { 
            
                    foreach($notices as $notice)
                    {
                      $array[0]=$notice->mark_as_read;
                      if(!Str::contains($array[0],("i:".''.Auth::user()->id.''.";")))
                      {
                        $notifications[]=$notice;
                      }
                      
                    }

                    if($notifications==null)
                    {
                      $array=123;
                    }
                    else
                    {
                      $array==null;
                    }
                  
                    $admission=Admission::where('user_id','=',Auth::user()->id)->get();
                    return view('admissions.parent_profile',compact('admission','notifications','array'));

              }
        }
   

        public function  edit_parent_profile($id)
        {
                
           



            global $notifications;

              $notices=Notice::where('to','=',3)->get();
                
              if($notices->first()==null)
              {
                $array=123;
                $notifications=null;
                $admission=Admission::where('user_id','=',Auth::user()->id)->get();
                $admission=$admission->first();
                return view('admissions.admission_edit',compact('admission','notifications','array'));
              }

            else
            { 
            
                    foreach($notices as $notice)
                    {
                      $array[0]=$notice->mark_as_read;
                      if(!Str::contains($array[0],("i:".''.Auth::user()->id.''.";")))
                      {
                        $notifications[]=$notice;
                      }
                      
                    }

                    if($notifications==null)
                    {
                      $array=123;
                    }
                    else
                    {
                      $array==null;
                    }
                  
                    
                    $admission=Admission::where('user_id','=',Auth::user()->id)->get();
                    return view('admissions.admission_edit',compact('admission','notifications','array'));

              }
        }






        public function update_parent_profile($id,Request $request)
        {

            global $notifications;

            $notices=Notice::where('to','=',3)->get();
              
            if($notices->first()==null)
            {
              $array=123;
              $notifications=null;
              $admission=Admission::find($id);

              if($request->input('firstname') !=null)
              {
                  $admission->firstname=$request->input('firstname');
                  $admission->save();
              }
              if($request->input('lastname') !=null)
              {
                  $admission->lastname=$request->input('lastname');
                  $admission->save();
              }
              if($request->input('dob') !=null)
              {
                  $admission->dob=$request->input('dob');
                  $admission->save();
              }
              if($request->input('password') !=null)
              {
                $user=User::where('id','=',$admission->user_id)->get();
                $user->first()->password=Hash::make($request->input('password'));
                $user->first()->save();
              }
              if($request->input('telephone') !=null)
              {
                  $admission->telephone=$request->input('telephone');
                  $admission->save();
              }

              if($request->hasfile('image'))
              {
               
                 
                          if($admission->img_filename != null)
                          {
                                 unlink(storage_path('students/'.$admission->user_id.'/'.$admission->image));
                          }
                         $file=$request->file('image');
                         $extension=$file->getClientOriginalExtension();
                         $filename=Str::random(5).'.'.$extension;
                         $path = storage_path('students/'.$admission->user_id);
                         File::makeDirectory($path, $mode = 777, true, true);
                         $file->move($path,$filename);
                         $admission->image=$filename;
                         $admission->save();
     
              }
              Flash::success('your profile hasbeen  updated successfully.');
              return back();
            }

          else
          { 
          
                  foreach($notices as $notice)
                  {
                    $array[0]=$notice->mark_as_read;
                    if(!Str::contains($array[0],("i:".''.Auth::user()->id.''.";")))
                    {
                      $notifications[]=$notice;
                    }
                    
                  }

                  if($notifications==null)
                  {
                    $array=123;
                  }
                  else
                  {
                    $array==null;
                  }
                
                  
                  $admission=Admission::find($id);

                  if($request->input('firstname') !=null)
                  {
                      $admission->firstname=$request->input('firstname');
                      $admission->save();
                  }
                  if($request->input('lastname') !=null)
                  {
                      $admission->lastname=$request->input('lastname');
                      $admission->save();
                  }
                  if($request->input('dob') !=null)
                  {
                      $admission->dob=$request->input('dob');
                      $admission->save();
                  }
                  if($request->input('password') !=null)
                  {

               

                     $user=User::where('id','=',$admission->user_id)->get();
                      $user->first()->password=Hash::make($request->input('password'));
                      $user->first()->save();
                  }
                  if($request->input('telephone') !=null)
                  {
                      $admission->telephone=$request->input('telephone');
                      $admission->save();
                  }
    
                  if($request->hasfile('image'))
                  {
                   
                     
                              if($admission->img_filename != null)
                              {
                                     unlink(storage_path('students/'.$admission->user_id.'/'.$admission->image));
                              }
                             $file=$request->file('image');
                             $extension=$file->getClientOriginalExtension();
                             $filename=Str::random(5).'.'.$extension;
                             $path = storage_path('students/'.$admission->user_id);
                             File::makeDirectory($path, $mode = 777, true, true);
                             $file->move($path,$filename);
                             $admission->image=$filename;
                             $admission->save();
         
                  }
                  Flash::success('your profile has been updated successfully');
    
                  return back();

            }

        }
}
