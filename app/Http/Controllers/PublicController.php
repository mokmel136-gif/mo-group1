<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Category;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use App\Models\SiteSetting;

class PublicController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('category')->where('status', 'published')->latest()->take(6)->get();
        $team = TeamMember::all();
        return view('welcome', compact('featuredProjects', 'team'));
    }

    public function projects(Request $request)
    {
        $query = Project::with('category')->where('status', 'published');

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $projects = $query->latest()->paginate(12);
        $categories = Category::all();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function about()
    {
        $team = TeamMember::all();
        return view('about', compact('team'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
