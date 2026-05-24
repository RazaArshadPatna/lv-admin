<?php
namespace App\Http\Controllers;
use App\Models\Statics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaticController extends Controller
{
    // List
    public function index()
    {
        $static = Statics::latest()->get();
        return view('control-panel.static.index', compact('static'));
    }

    // Create form
    public function create()
    {
        return view('control-panel.static.create');
    }

    // Store
    public function store(Request $request)
    {
      

        $image = $request->file('image')
            ? $request->file('image')->store('statics', 'public')
            : null;

        Statics::create([
            'heading' => $request->heading,
            'title' => $request->title,
            'details' => $request->details,
            'image' => $image
        ]);

        return redirect()->route('pages.index')
            ->with('success', 'User created successfully');
    }

    // Edit
    public function edit($id)
    {
        $static = Statics::findOrFail($id);
       return view('control-panel.static.edit', compact('static'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $static = Statics::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($static->image) {
                Storage::disk('public')->delete($static->image);
            }
            $static->image = $request->file('image')->store('statics', 'public');
        }

        $static->update([
            'heading' => $request->heading,
            'title' => $request->title,
            'details' => $request->details,
            'image' => $static->image,
        ]);

        return redirect()->route('pages.index')
            ->with('success', 'Updated successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:statics,id'
        ]);

        Statics::whereIn('id', $request->ids)->delete();

        return redirect()->route('pages.index')
            ->with('success', 'Selected users deleted successfully.');
    }
}