<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class ApiResumeController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('PersonalAccessToken')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('PersonalAccessToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

   public function jsonData()
    {
        $user = auth()->user();
        $experiences = $user->experiences()->get()->toArray();
        $education   = $user->education()->get()->toArray();
        $skills  = $user->skills()->get()->toArray();
        $details = $user->details()->get()->toArray();
        
        $resume_full_info = [
            'details'     => [],
            'education'   => [],
            'experiences' => [],
            'skills'      => [],
        ];
        //getting required data from user details
        foreach ($details as $detail) {
            $detail_stack = [
                'fullname' => $detail['fullname'],
                'email' => $detail['email'],
                'phone' => $detail['phone'],
                'address' => $detail['address'],
                'summary' => $detail['summary'],
            ];
            array_push($resume_full_info['details'], $detail_stack);
        }

        //getting required data from user education
        foreach($education as $education) {
            $education_stack = [
                'school_name' => $education['school_name'],
                'school_location'  => $education['school_location'],
                'degree'      => $education['degree'],
                'field_of_study'     => $education['field_of_study'],
                'graduation_start_date' => $education['graduation_start_date'],
                'graduation_end_date'   => $education['graduation_end_date'],
            ];

            array_push($resume_full_info['education'], $education_stack);
        }

        //getting required data from user experiences
        foreach($experiences as $experience) {
            $experience_stack = [
                'job_title' => $experience['job_title'],
                'employer'  => $experience['employer'],
                'city'      => $experience['city'],
                'state'     => $experience['state'],
                'start_date' => $experience['start_date'],
                'end_date'   => $experience['end_date'],
            ];

            array_push($resume_full_info['experiences'], $experience_stack);
        }
        
        //getting required data from user skills

        foreach($skills as $skill) {
            $skill_stack = [
                'name' => $skill['name'],
                'rating'  => $skill['rating'],
            ];

            array_push($resume_full_info['skills'], $skill_stack);
        }
      
        return response()->json($resume_full_info, 200);
    }
}
