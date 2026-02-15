<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store project:', $request->except(['thumbnail', 'file_path', 'images']));
        
        try {
            $request->validate([
                'title' => 'required',
                'category_id' => 'required|exists:categories,id',
                'thumbnail' => 'nullable|image|max:2048',
                'file_path' => 'nullable|file|mimes:zip,rar,7z,tar,gz,pdf,doc,docx|max:524288',
                'images.*' => 'nullable|image|max:5120', // 5MB per gallery image
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed for project creation:', $e->errors());
            throw $e;
        }

        $data = $request->except(['thumbnail', 'file_path', 'images']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
            Log::info('Thumbnail stored at: ' . $data['thumbnail']);
        }

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('projects/files', 'public');
            Log::info('File stored at: ' . $data['file_path']);
        }

        try {
            $project = Project::create($data);
            Log::info('Project created successfully with ID: ' . $project->id);
            
            // Handle multiple gallery images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('projects/gallery', 'public');
                    $project->images()->create([
                        'image_path' => $path,
                        'order' => $index,
                    ]);
                    Log::info('Gallery image stored at: ' . $path);
                }
            }
            
            return redirect()->route('admin.projects.index')->with('success', 'تم إضافة المشروع بنجاح!');
        } catch (\Exception $e) {
            Log::error('Failed to create project in database: ' . $e->getMessage());
            return back()->withInput()->with('error', 'حدث خطأ أثناء حفظ المشروع في قاعدة البيانات: ' . $e->getMessage());
        }
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|max:2048',
            'file_path' => 'nullable|file|mimes:zip,rar,7z,tar,gz,pdf,doc,docx|max:524288',
            'images.*' => 'nullable|image|max:5120',
        ]);

        $data = $request->except(['thumbnail', 'file_path', 'images']);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($project->file_path) Storage::disk('public')->delete($project->file_path);
            $data['file_path'] = $request->file('file_path')->store('projects/files', 'public');
        }

        $project->update($data);

        // Handle multiple gallery images
        if ($request->hasFile('images')) {
            $maxOrder = $project->images()->max('order') ?? -1;
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'order' => $maxOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'تم تحديث المشروع بنجاح!');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
        if ($project->file_path) Storage::disk('public')->delete($project->file_path);
        
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح!');
    }
}
