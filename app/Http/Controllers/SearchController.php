<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerProfile;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
        // Search for job seekers in the marketplace
        public function searchMarketPlace(Request $request)
        {
            $query = JobSeekerProfile::query();
    
            if ($request->filled('category')) {
                $query->whereHas('categories', function($q) use ($request) {
                    $q->where('name', $request->category);
                });
            }
    
            if ($request->filled('location')) {
                $query->where('location', 'LIKE', '%' . $request->location . '%');
            }
    
            if ($request->filled('experience_years')) {
                $query->where('experience_years', '>=', $request->experience_years);
            }
    
            if ($request->filled('skills')) {
                $skills = explode(',', $request->skills);
                $query->where(function($q) use ($skills) {
                    foreach ($skills as $skill) {
                        $q->orWhere('skills', 'LIKE', '%' . trim($skill) . '%');
                    }
                });
            }
    
            if ($request->filled('expected_salary')) {
                $query->where('expected_salary', '<=', $request->expected_salary);
            }
    
            // Fetch the search results
            $jobSeekerProfiles = $query->get();
            // dd($jobSeekerProfiles);
    
            return view('marketplace', compact('jobSeekerProfiles'));
        }
}
