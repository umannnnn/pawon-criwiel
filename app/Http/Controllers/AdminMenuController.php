<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $menus = Menu::paginate(7);
        return view('dashboard.menus.index', [
            'title' => 'Menu',
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menus.create', [
            'title' => 'Tambah Menu',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:menus',
            'category_id' => 'required',
            'desc' => 'required',
            'image' => 'required|array',
            'image.*' => 'image|file|max:5000',
            'body' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image_paths = [];
            foreach ($request->file('image') as $image) {
                $image_paths[] = $image->store('menu-images', 'public');
            }
            $validatedData['image'] = json_encode($image_paths);
        }

        $validatedData['body'] = strip_tags($validatedData['body']);

        Menu::create($validatedData);
        
        return redirect('/dashboard/menus')->with('success', 'Menu baru berhasil ditambahkan.');
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
    public function edit(Menu $menu)
    {
        return view('dashboard.menus.edit', [
            'title' => 'Update Menu',
            'menu' => $menu,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required', 
            'desc' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus';
        } 

        $validatedData = $request->validate($rules);

        $validatedData['body'] = strip_tags($validatedData['body']);

        Menu::where('id', $menu->id)
            ->update($validatedData);

        return redirect('/dashboard/menus')->with('success', 'Menu tersebut berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('/dashboard/menus')->with('success', 'Menu tersebut berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
