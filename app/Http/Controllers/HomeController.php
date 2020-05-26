<?php

namespace App\Http\Controllers;
use Auth;
use App\Advertisement;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Admission;
use App\Notice;
use App\NoticeUser;
use DB;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        if(Auth::user()->role== 2)
        {
            //teacher
           

          
           
                        global $count;
                        $teacher=Teacher::where('user_id','=',Auth::user()->id)->get();

                    $notices=Notice::where('to','=',2)->get();
                    if($notices->first()==null)
                    {

                    
                            $array=12;
                            return view('home',compact('teacher','array'));
                    }



                else

                
                {
                
                     foreach($notices as $notice)
                                {


                                         
                                            $array[0]=$notice->mark_as_read;
                                            if( Str::contains($array[0],"i:".''.Auth::user()->id))
                                            {
                                                $count++;
                                            }


                                                            
                                            
                                        

                                }


                        
                            

                                if($count<(count($notices)))
                                {
                                    $array=null;
                                    $count_notifications=((count($notices))-$count);

                                    return view('home',compact('teacher','array','count_notifications'));
                                }
                                else
                                {
                                    
                                    $array=11212;
                                    return view('home',compact('teacher','array'));
                                }
                                
                                
                                
                                
            }

                    }
                    elseif(Auth::user()->role==3)
                    { 
                        global $count;
                        $admission=Admission::where('user_id','=',Auth::user()->id)->get();

                    $notices=Notice::where('to','=',3)->get();
                    if($notices->first()==null)
                    {

                    
                            $array=12;
                            return view('home',compact('admission','array'));
                    }



                else

                
                {

                                    foreach($notices as $notice)
                                    {
                                                $array[0]=$notice->mark_as_read;
                                                if( Str::contains($array[0],"i:".''.Auth::user()->id))
                                                {
                                                $count++;
                                                }
    
                                    }

                                    if($count<(count($notices)))
                                    {
                                        $array=null;
                                    $count_notifications=((count($notices))-$count);

                                        return view('home',compact('admission','array','count_notifications'));
                                    }
                                    else
                                    {
                                    
                                        $array=11212;
                                        return view('home',compact('admission','array'));
                                    }
       
                }

    }
        else
        {
            //admin
            return view('home');
        }
    }



    


   
}
