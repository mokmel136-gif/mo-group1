<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('category')->where('status', 'published');

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $projects = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load(['category', 'images']);
        return view('projects.show', compact('project'));
    }
}
