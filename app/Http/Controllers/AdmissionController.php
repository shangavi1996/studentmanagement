<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Repositories\AdmissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;
use Response;
use File;
use Auth;
use Illuminate\Support\Str;
use App\User;
use App\Models\Admission;
use DB;


class AdmissionController extends AppBaseController
{
    /** @var  AdmissionRepository */
    private $admissionRepository;

    public function __construct(AdmissionRepository $admissionRepo)
    {
        $this->admissionRepository = $admissionRepo;
    }

    /**
     * Display a listing of the Admission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $admissions = Admission::paginate(5);
        return view('admissions.index')
            ->with('admissions', $admissions);
    }

    /**
     * Show the form for creating a new Admission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admissions.create');
    }

    /**
     * Store a newly created Admission in storage.
     *
     * @param CreateAdmissionRequest $request
     *
     * @return Response
     */
    public function store(CreateAdmissionRequest $request)
    {
        $input = $request->all();

        $user=new User();
        $admission = $this->admissionRepository->create($input);
        $user->name=$request->input('firstname');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role=3;
        $user->verified=1;
        $user->save();
        if($request->hasfile('image'))
         {
        
                    $file=$request->file('image');
                    $extension=$file->getClientOriginalExtension();
                    $filename=Str::random(5).'.'.$extension;
                    $path = storage_path('students/'.$user->id);
                    File::makeDirectory($path, $mode = 777, true, true);
                    $file->move($path,$filename);
                    $admission->image=$filename;

         }
          $admission->user_id=$user->id;
         $admission->save();

        Flash::success('Admission saved successfully.');

        return redirect(route('admissions.index'));
    }

    /**
     * Display the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.show')->with('admission', $admission);
    }

    /**
     * Show the form for editing the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.edit')->with('admission', $admission);
    }

    /**
     * Update the specified Admission in storage.
     *
     * @param int $id
     * @param UpdateAdmissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdmissionRequest $request)
    {
        $admission = $this->admissionRepository->find($id);

      
        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        $admission->firstname=$request->input('firstname');
        $admission->lastname=$request->input('lastname');
        $admission->dob=$request->input('dob');
        $admission->status=$request->input('status');
        $admission->address=$request->input('address');
        $admission->telephone=$request->input('telephone');
        $admission->gender=$request->input('gender');  
        $admission->date_registered=$request->input('date_registered');
        $admission->email=$request->input('email');
        $admission->save();

        $user=User::where('id','=',$admission->user_id)->get();
        $user->first()->email=$request->input('email');
        $user->first()->name=$request->input('firstname');
        $user->first()->save();
      


        if($request->input('status')==0)
        {


            $user=User::where('id','=',$admission->user_id)->get();
            $user->first()->verified=0;
            $user->first()->save();
        }
        else
        {
            $user=User::where('id','=',$admission->user_id)->get();
            $user->first()->verified=1;
            $user->first()->save();

        }

 
        if($request->hasfile('image') )
         {
            
          
            
                     if($admission->image != null)
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

         

        Flash::success('Admission updated successfully.');

        return redirect(route('admissions.index'));
    }

    /**
     * Remove the specified Admission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {

       
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        $this->admissionRepository->delete($id);

        Flash::success('Admission deleted successfully.');

        return redirect(route('admissions.index'));
    }

    public function search(Request $request)
    {

        if(!$request->input('search'))
        {
            Flash::error('search is empty');
            return back();

        }
        else
        {
                $datas = DB::table('admissions')
                ->where('firstname', 'like', '%'.$request->input('search').'%')
                ->orWhere('lastname', 'like', '%'.$request->input('search').'%')
                ->orWhere('email', 'like', '%'.$request->input('search').'%')
                ->get();
                if($datas->isEmpty())
                {
                    Flash::error('cannot find the student');
                    return redirect(route('admissions.index')); 
                }
                else
                {
                    return view('admissions.search_admissions',compact('datas'));
                }

        }
    }
}
