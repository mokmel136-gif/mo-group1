<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::all();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'تم إضافة عضو الفريق بنجاح!');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($team->image) Storage::disk('public')->delete($team->image);
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'تم تحديث بيانات عضو الفريق بنجاح!');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->image) Storage::disk('public')->delete($team->image);
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'تم حذف عضو الفريق بنجاح!');
    }
}
