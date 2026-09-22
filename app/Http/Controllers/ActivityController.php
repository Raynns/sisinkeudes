<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:activities,code',
            'name' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'year' => 'required|digits:4',
        ]);

        Activity::create($validated);

        return redirect()->route('activities.index')->with('success', 'Data Kegiatan berhasil ditambahkan!');
    }
}