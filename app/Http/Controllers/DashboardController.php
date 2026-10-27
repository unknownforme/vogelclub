<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberType;
use App\Models\BreedingNumber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_members' => Member::count(),
            'active_members' => Member::where('is_active', true)->count(),
            'pending_members' => Member::where('is_active', false)->count(),
            'member_types' => MemberType::count(),
            'breeding_numbers' => BreedingNumber::count(),
        ];

        $recent_members = Member::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recent_members'));
    }
}
