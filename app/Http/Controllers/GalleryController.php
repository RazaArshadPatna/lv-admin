<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // List
    public function index()
    {
        $gallery = Gallery::latest()->get();
        return view('control-panel.gallery.index', compact('gallery'));
    }

    // Create form
    public function create()
    {
        return view('control-panel.gallery.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'title' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image'
        ]);

        $image = $request->file('image')
            ? $request->file('image')->store('gallery', 'public')
            : null;

        Gallery::create([
            'heading' => $request->heading,
            'status' => $request->status,
            'title' => $request->title,
            'image' => $image
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'User created successfully');
    }

    // Edit
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
       return view('control-panel.gallery.edit', compact('gallery'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
            'title' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->image = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update([
            'heading' => $request->heading,
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery updated successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:gallery,id'
        ]);

        Gallery::whereIn('id', $request->ids)->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Selected Photo deleted successfully.');
    }
}