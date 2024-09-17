<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSeekerProfile;
use App\Models\Category;
use App\Models\Referral;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function createProfileView()
    {
        return view('JobSeeker.create');
    }
    public function createProfile(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:job_seeker_profiles',
                'phone_number' => 'nullable|string|max:15',
                'current_job_title' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'experience_years' => 'required|integer|min:0',
                'skills' => 'required|string',
                'education' => 'required|string',
                'location' => 'required|string|max:255',
                'current_salary' => 'nullable|numeric|min:0',
                'expected_salary' => 'required|numeric|min:0',
                'willing_to_relocate' => 'required|boolean',
                'availability' => 'required|string|max:255',
                'linkedin_profile' => 'nullable|url',
                'github_profile' => 'nullable|url',
                'leetcode_profile' => 'nullable|url',
                'portfolio_website' => 'nullable|url',
                'highest_degree' => 'nullable|string|max:255',
                'institution' => 'nullable|string|max:255',
                'gpa' => 'nullable|string|max:255',
                'languages' => 'nullable|string',
                'certifications' => 'nullable|string',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);
    
            // Create new JobSeekerProfile
            $profile = new JobSeekerProfile();
            $profile->user_id = Auth::id();
            $profile->full_name = $request->full_name;
            $profile->email = $request->email;
            $profile->phone_number = $request->phone_number;
            $profile->current_job_title = $request->current_job_title;
            $profile->industry = $request->industry;
            $profile->experience_years = $request->experience_years;
            $profile->skills = json_encode(explode(',', $request->skills)); // Store skills as JSON array
            $profile->education = json_encode(explode(',', $request->education)); // Store education as JSON array
            $profile->location = $request->location;
            $profile->current_salary = $request->current_salary;
            $profile->expected_salary = $request->expected_salary;
            $profile->willing_to_relocate = $request->willing_to_relocate;
            $profile->availability = $request->availability;
            $profile->linkedin_profile = $request->linkedin_profile;
            $profile->github_profile = $request->github_profile;
            $profile->leetcode_profile = $request->leetcode_profile;
            $profile->portfolio_website = $request->portfolio_website;
            $profile->highest_degree = $request->highest_degree;
            $profile->institution = $request->institution;
            $profile->gpa = $request->gpa;
            $profile->languages = json_encode(explode(',', $request->languages)); // Store languages as JSON array
            $profile->certifications = json_encode(explode(',', $request->certifications)); // Store certifications as JSON array
            $profile->resume = $request->file('resume')->store('resumes'); // Save resume
    
            // Save profile to the database
            $profile->save();
    
            return redirect()->back()->with('success', 'Profile created successfully!');
        }
        
        // return view('create_profile');
    }
    

    public function editProfile(Request $request, $id)
    {
        $profile = JobSeekerProfile::findOrFail($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'current_job_title' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'experience_years' => 'required|integer|min:0',
                'skills' => 'required|array',
                'education' => 'required|array',
                'location' => 'required|string|max:255',
                'expected_salary' => 'required|numeric|min:0',
                'availability' => 'required|string|max:255',
                'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            $profile->full_name = $request->full_name;
            $profile->phone_number = $request->phone_number;
            $profile->current_job_title = $request->current_job_title;
            $profile->industry = $request->industry;
            $profile->experience_years = $request->experience_years;
            $profile->skills = json_encode($request->skills);
            $profile->education = json_encode($request->education);
            $profile->location = $request->location;
            $profile->expected_salary = $request->expected_salary;
            $profile->availability = $request->availability;

            if ($request->hasFile('resume')) {
                $profile->resume = $request->file('resume')->store('resumes');
            }

            $profile->save();

            return redirect()->route('view_profile', $profile->id);
        }

        return view('edit_profile', compact('profile'));
    }

    public function viewProfile($id)
    {
        $profile = JobSeekerProfile::findOrFail($id);
        return view('view_profile', compact('profile'));
    }

    public function listMarketPlace()
    {
        $jobSeekerprofiles = JobSeekerProfile::all();
        // dd($profiles);
        return view('marketplace', compact('jobSeekerprofiles'));
    }
    public function showJobSeekerRequests()
    {
        // dd(Auth::id());
        // Get the authenticated user's job seeker profile
        $jobSeekerProfile = JobSeekerProfile::where('user_id', Auth::id())->firstOrFail();

        // Fetch all referrals made by this job seeker
        $jobSeekerRequests = Referral::where('job_seeker_profile_id', $jobSeekerProfile->id)
            ->with('referrerProfile', 'company') // assuming relationships are set for referrerProfile and company
            ->get();

        // Return the view with the job seeker requests
        return view('JobSeeker.request', compact('jobSeekerRequests'));
    }
    
}
