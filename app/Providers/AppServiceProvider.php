<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admission;
use App\Models\Teacher;
use App\Notice;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        


         
View::composer('layouts.app', function ($view) {

if(Auth::user()->role== 2)
{
    //teacher
   

  
   
                global $count;
                $teacher=Teacher::where('user_id','=',Auth::user()->id)->get();

            $notices=Notice::where('to','=',2)->get();
            if($notices->first()==null)
            {

            
                    $array=12;
                    $view->with('teacher', $teacher,'array',$array);
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

                     
                            $view->with('teacher', $teacher,'array',$array,'count_notifications',$count_notifications);
                        }
                        else
                        {
                            
                            $array=11212;
                            $view->with('teacher', $teacher,'array',$array);
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
                    $view->with('admission', $admission,'array',$array);
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

                            $view->with('admission', $admission,'array',$array,'count_notifications',$count_notifications);
                            }
                            else
                            {
                            
                                $array=11212;
                                $view->with('admission', $admission,'array',$array);
                            }

        }

}
           
            
       //end    




        });






        
    }
}








