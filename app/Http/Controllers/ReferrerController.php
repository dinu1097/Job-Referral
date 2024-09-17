<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\JobSeekerProfile;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\ReferrerProfile;

class ReferrerController extends Controller
{
    public function create()
    {
        // Fetch all companies from the database
        $companies = Company::all();

        // Return the view with the companies list
        return view('Referrer.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'position' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            // 'user_id' is no longer needed in validation as we are setting it manually
        ]);
    
        // Create the referrer profile with authenticated user's ID
        ReferrerProfile::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'company_id' => $request->company_id,
            'user_id' => Auth::id(), // Set user_id to the ID of the currently authenticated user
        ]);
    
        return redirect()->back()->with('success', 'Profile created successfully!');
    }
    public function indexRequest()
    {
        // Get the authenticated user's referrals with job seeker profiles and statuses
        $jobSeekerProfiles = JobSeekerProfile::join('referrals', 'job_seeker_profiles.id', '=', 'referrals.job_seeker_profile_id')
            ->where('referrals.referrer_id', Auth::id()) // Filter by authenticated user's ID
            ->select('job_seeker_profiles.*', 'referrals.status as referral_status', 'referrals.created_at as referral_date','referrals.id as referral_id')
            ->get();
    
        // Return the view with the list of job seeker profiles and their referral statuses
        return view('referrer.applications', compact('jobSeekerProfiles'));
    }
    
    
    public function updateReferralStatus(Request $request)
    {
        
        // Validate the request to ensure only valid status is accepted
        $request->validate([
            'referral_id' => 'required|exists:referrals,id',
            'status' => 'required|in:accepted,pending,declined', // Updated to match enum values
        ]);
    
        // Find the referral by ID
        $referral = Referral::findOrFail($request->referral_id);
        // dd($referral);
        // Update the referral status
        $referral->status = $request->status;
        $referral->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Referral status updated successfully.');
    }
    
    

    
}
