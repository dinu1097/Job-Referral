<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\ReferrerProfile;
use App\Models\Referral;
use App\Models\JobSeekerProfile;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('request-referrals',compact('companies'));
        
    }
    public function createCompanyApplicationRequest(Request $request)
    {
        
        // Validate the company ID
        $request->validate([
            'company_id' => 'required|exists:companies,id',
        ]);
    
        // Get the company ID from the request
        $companyId = $request->company_id;
    
        // Get the currently authenticated user's job seeker profile
        $jobSeekerProfile = JobSeekerProfile::where('user_id', Auth::id())->firstOrFail();
    
        // Find all referrers associated with the company
        $referrerProfiles = ReferrerProfile::where('company_id', $companyId)->get();
    
        $alreadyExists = false; // Flag to check if referral already exists
    
        foreach ($referrerProfiles as $referrerProfile) {
            // Check if a referral already exists for the job seeker and referrer
            $existingReferral = Referral::where('job_seeker_profile_id', $jobSeekerProfile->id)
                ->where('referrer_id', $referrerProfile->user_id)
                ->first();
    
            if ($existingReferral) {
                // If referral already exists, set the flag to true
                $alreadyExists = true;
                break;
            }
        }
    
        if ($alreadyExists) {
            // If a referral already exists, redirect back with an 'already exists' message
            return redirect()->back()->with('error', 'You have already applied for this company.');
        }
    
        // Create a referral for each referrer if no referral exists
        foreach ($referrerProfiles as $referrerProfile) {
            Referral::create([
                'job_seeker_profile_id' => $jobSeekerProfile->id,
                'referrer_id' => $referrerProfile->user_id,
                'status' => 'pending',
                'referral_message' => 'Hello', // Default referral message
            ]);
        }
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application submitted successfully for this company.');
    }
    
}
