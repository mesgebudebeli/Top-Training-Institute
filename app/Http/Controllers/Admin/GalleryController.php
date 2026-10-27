<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|url',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|url',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
