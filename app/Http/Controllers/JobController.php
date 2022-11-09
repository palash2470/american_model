<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cities;
use App\Models\Job;
use App\Models\JobImage;
use App\Models\JobLocation;
use App\Models\JobsApply;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function jobs ()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $job = Job::where('createdBy', auth()->user()->id)->orderBy('id','desc')->get();
        return view('job.jobs',compact('job','user'));
    }

    public function jobApplied ($id)
    {
        $user = User::where('id',Auth::user()->id)->first();
        // $appliedUser = JobsApply::where('jobId',$id)->get();
        $job = Job::where('id',$id)->first();
        return view('job.jobApplied',compact('job','user'));
    }

    public function job(Request $request)
    {
        $category = Category::where('id', '!=', 5)->get();
        $job = Job::whereDate('toJobDate', '>=', now())->paginate(10);
        return view('job.job',compact('category','job'));
    }

    public function jobSearch(Request $request, $id)
    {
        $data = decrypt($id);
        $job = Job::whereDate('toJobDate', '>=', now())->paginate(10);
        if ($data['jobCategory']) {
            if ($data['jobCategory'] !== 'all') {
                $job = Job::where('jobCategory',$data['jobCategory'])->whereDate('toJobDate', '>=', now())->paginate(10);
            }
        } else {
            $job = Job::all();
        }
        $category = Category::where('id', '!=', 5)->get();
        return view('job.job',compact('category','job','data'));
    }

    public function jobSearchPost(Request $request)
    {
        $data = encrypt($request->all());
        return redirect('job-search/'.$data);
    }

    public function jobDetails ($id)
    {
        $job = Job::where('id',$id)->first();
        $relatedJobs = Job::where('id','!=',$job->id)->where('jobCategory',$job->jobCategory)->whereDate('toJobDate', '>=', now())->get();
        return view('job.jobDetail',compact('job','relatedJobs'));
    }

    public function postJob ()
    {
        $getCities = Cities::where('state_id', 41)->get();
        //dd($getCities);
        $category = Category::where('id', '!=', 5)->get();
        return view('job.postJob',compact('getCities','category'));
    }

    public function postJobStore(Request $request)
    {
        //dd($request->all());
        try {
            $this->validate($request,[
                'jobTitle'          => 'required',
                'jobCategory'       => 'required',
                //'budget'            => 'required',
                //'fromJobDate'       => 'required',
                'toJobDate'         => 'required',
                'fromAge'           => 'required',
                'toAge'             => 'required',
                'gender'            => 'required',
                'jobDescription'    => 'required',
                'jobPreference'    => 'required',
                'jobRequirement'    => 'required',
                //'image'             => 'required|image|mimes:jpg,png,gif,jpeg',
                //"location"          => "required|array",
                //"location.*"        => "required",
                "location"          => "required",
                "images"            => "required",
                'images.*'          => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
            $imageName = '';
            if($request->hasFile('image'))
            {
                $imageName = time().uniqid(). '.'.$request->image->extension();
                $request->image->move(public_path('/images/job'), $imageName);
            }
            $jobs = Job::create([
                'jobReference'      => 'ref-'.uniqid(),
                'title'             => $request->jobTitle,
                'jobCategory'       => $request->jobCategory,
                'seeking'       => $request->seeking,
                //'image'             => $imageName,
                'budget'            => 0,
                //  'fromJobDate'       => $request->fromJobDate,
                'toJobDate'         => $request->toJobDate,
                'fromAge'           => $request->fromAge,
                'toAge'             => $request->toAge,
                'height'             => $request->height,
                'compensation'             => $request->compensation,
                'gender'            => $request->gender,
                'jobDescription'    => $request->jobDescription,
                'jobPreference'    => $request->jobPreference,
                'jobRequirement'    => $request->jobRequirement,
                'createdBy'         => auth()->user()->id,
            ]);

            if (isset($jobs)) {
                if($request->hasfile('images'))
                {
                    foreach($request->file('images') as $key => $file)
                    {
                        //echo $file->getClientOriginalExtension();die;
                        $imageName = time().uniqid(). '.'.$file->extension();
                        $file->move(public_path('/images/job'), $imageName);
                        //$path = $file->store('public/images');
                        //$name = $file->getClientOriginalName();
                        $insert[$key]['image'] = $imageName;
                        $insert[$key]['job_id'] = $jobs->id;
                    }
                    JobImage::insert($insert);
                }
                
                /* foreach ($request->location as $key => $value) {
                    JobLocation::create([
                        'jobId' => $jobs->id,
                        'location' => $value
                    ]);

                    $getCity = Cities::where('id',$value)->first();
                    $users = UserDetails::where(['membership_type_id' => $request->jobCategory,'city_name'=>$getCity->name])->get();
                    foreach ($users as $userskey => $usersvalue) {
                        if (isset($usersvalue->getUser)) {
                            $data = array(
                                'msg' => $request->jobDescription,
                                'sub' => 'New job in your area',
                                'modelsEmail' => $usersvalue->getUser->email,
                                'modelName' => $usersvalue->getUser->name,
                                'userEmail' => auth()->user()->email,
                                'userName' => auth()->user()->name,
                            );
                            Mail::send('emails.sendMailToModels', $data, function($m) use ($data) {
                                $m->to($data['modelsEmail'],$data['modelName'] );
                                $m->subject($data['sub']);
                            });
                        }
                        
                    }
                } */
            }
            return redirect()->to('job')->with('success', 'Post job successfully');
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function jobApply ($id)
    {
        $job = Job::where('id',$id)->first();
        return view('job.jobApply',compact('job'));
    }

    public function jobApplyStore (Request $request)
    {
        try {
            $this->validate($request,[
                'message'          => 'required',
            ]);

            $getApplyJob = JobsApply::where(['jobId' => $request->jobId, 'userId' => auth()->user()->id])->first();

            if (isset($getApplyJob)) {
                return redirect()->to('job/details'.'/'.$request->jobId)->with('error','You already applied for this job !');
            }

            $attachment = '';
            if($request->hasFile('image'))
            {
                $attachment = time().uniqid(). '.'.$request->image->extension();
                $request->image->move(public_path('images/jopApply'), $attachment);
            }
            JobsApply::create([
                'jobId'         => $request->jobId,
                'userId'        => auth()->user()->id,
                'message'       => $request->message,
                'attachment'    => $attachment,
            ]);

            return redirect()->to('job/details'.'/'.$request->jobId)->with('success', 'Apply job successfully');
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function postJobUpdate ($id)
    {
        $getCities = Cities::where('state_id', 41)->get();
        $category = Category::where('id', '!=', 5)->get();
        $job = Job::where('id',$id)->first();
        $joblocation = array_column($job->getJobLocations->toArray(),'location');
        return view('job.postJobUpdate', compact('getCities','category','job','joblocation'));
    }

    public function postJobUpdateStore(Request $request)
    {
        try {
            $this->validate($request,[
                'jobDescription'    => 'required',
            ]);
            
            $jobs = Job::where('id', $request->id)->update([
                'jobDescription'    => $request->jobDescription,
            ]);
            return redirect()->to('job')->with('success', 'Update job successfully');
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }
}
