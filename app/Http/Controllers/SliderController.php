<?php
namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    // List
   public function index(Request $request)
{
    if ($request->ajax()) {

        $data = Slider::latest();

        return DataTables::of($data)

            ->addIndexColumn()

            ->addColumn('image', function ($row) {

                if ($row->image) {
                    return '<img src="'.asset('storage/'.$row->image).'" 
                            width="50" height="50" 
                            class="rounded-circle object-fit-cover">';
                }

                return '<img src="'.asset('assets/img/default-user.png').'" 
                        width="50" height="50" 
                        class="rounded-circle">';
            })

            ->addColumn('action', function ($row) {

                $btn = '
                    <a href="'.route('slider.edit', $row->id).'" 
                       class="btn btn-sm btn-primary">
                       <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                ';

                return $btn;
            })

            ->rawColumns(['image', 'action'])

            ->make(true);
    }

    return view('control-panel.slider.index');
}

    // Create form
    public function create()
    {
        return view('control-panel.slider.create');
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
            ? $request->file('image')->store('slider', 'public')
            : null;

        Slider::create([
            'heading' => $request->heading,
            'status' => $request->status,
            'title' => $request->title,
            'image' => $image
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'User created successfully');
    }

    // Edit
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
       return view('control-panel.slider.edit', compact('slider'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
            'title' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $slider->image = $request->file('image')->store('slider', 'public');
        }

        $slider->update([
            'heading' => $request->heading,
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'slider updated successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:slider,id'
        ]);

        Slider::whereIn('id', $request->ids)->delete();

        return redirect()->route('slider.index')
            ->with('success', 'Selected slider deleted successfully.');
    }
}