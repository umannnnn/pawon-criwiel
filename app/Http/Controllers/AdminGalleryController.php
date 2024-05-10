<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::paginate(8);

        return view('dashboard.galleries.index', [
            'title' => 'Galeri',
            'galleries' => $galleries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:5000'
            ]);

            if ($request->file('image')) {
                $validateData['image'] = $request->file('image')->store('gallery-images', 'public');
            }

            Gallery::create($validateData);
            return redirect('/dashboard/galleries')->with('success', 'Gambar berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Mengirim pesan error jika terjadi exception
            return redirect('/dashboard/galleries')->with('error', 'Gambar gagal ditambahkan. Pastikan file yang diupload adalah gambar dengan format jpeg, jpg, atau png dan ukurannya tidak lebih dari 5MB.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect('/dashboard/galleries')->with('success', 'Gambar tersebut berhasil dihapus.');
    }
}
