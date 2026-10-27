<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->get();
        return view('gallery', compact('galleries'));
    }
}
