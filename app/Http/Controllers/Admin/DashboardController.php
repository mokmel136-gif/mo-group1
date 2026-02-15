<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\TeamMember;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects_count' => Project::count(),
            'team_count' => TeamMember::count(),
            'unread_messages_count' => ContactMessage::where('is_read', false)->count(),
        ];
        return view('dashboard', compact('stats'));
    }
}
