<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use App\Image;
use App\Models\Teacher;
use File;
use Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TeacherController extends AppBaseController
{
    /** @var  TeacherRepository */
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teachers = Teacher::all();
        return view('teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new Teacher.
     *
     * @return Response
     */
    public function create()
    {


       
      
        return view('teachers.create');
    }

    /**
     * Store a newly created Teacher in storage.
     *
     * @param CreateTeacherRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        // $input = $request->all();

        

      $user=new User();
      $user->name=$request->input('firstname');
      $user->email=$request->input('email');
      $user->role=2;
      $user->verified=1;
      $user->password=Hash::make($request->input('password'));
      $user->save();
     $teacher=new Teacher();
     $teacher->firstname=$request->input('firstname');
     $teacher->lastname=$request->input('lastname');
     $teacher->date_registered=Carbon::parse($request->input('date_registered'))->format('Y-m-d');
     $teacher->status=$request->input('status');
     $teacher->email=$request->input('email');
     $teacher->address=$request->input('address');
     $teacher->dob=Carbon::parse($request->input('dob'))->format('Y-m-d');
     $teacher->gender=$request->input('gender');
     $teacher->telephone=$request->input('telephone');
     $teacher->user_id=$user->id;
     $teacher->grade=$request->input('grade');

         if($request->hasfile('image'))
         {
                    $file=$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=Str::random(5).'.'.$extension;
                    $path = storage_path('teachers/'.$user->id);
                    File::makeDirectory($path, $mode = 777, true, true);
                    $file->move($path,$filename);
                    $teacher->img_filename=$filename;

         }
                    $teacher->save();
           


      
       



        Flash::success('Teacher saved successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified Teacher in storage.
     *
     * @param int $id
     * @param UpdateTeacherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        $teacher = $this->teacherRepository->find($id);
          
        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $teacher = $this->teacherRepository->update($request->all(), $id);
        if($request->input('status')==0)
        {


            $user=User::where('id','=',$teacher->user_id)->get();
            $user->first()->verified=0;
            $user->first()->save();
        }
        else
        {
            $user=User::where('id','=',$teacher->user_id)->get();
            $user->first()->verified=1;
            $user->first()->save();

        }


        if($request->hasfile('image'))
         {
          
            
                     if($teacher->img_filename != null)
                     {
                            unlink(storage_path('teachers/'.$teacher->user_id.'/'.$teacher->img_filename));
                     }
                    $file=$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=Str::random(5).'.'.$extension;
                    $path = storage_path('teachers/'.$teacher->user_id);
                    File::makeDirectory($path, $mode = 777, true, true);
                    $file->move($path,$filename);
                    $teacher->img_filename=$filename;
                    $teacher->save();

         }

        Flash::success('Teacher updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified Teacher from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacher = $this->teacherRepository->find($id);
        $user=User::find($teacher->user_id);
        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }
        
        if($teacher->img_filename != null)
        {
               unlink(storage_path('teachers/'.$teacher->user_id.'/'.$teacher->img_filename));
        }
        $teacher->forceDelete();
        $user->delete();
       
        Flash::success('Teacher deleted successfully.');

        return redirect(route('teachers.index'));
    }
}
