<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('menu', [
            "title" => "Menu" . $title,
            'categories' => $categories,
            "menus" => Menu::latest()->filter(request(['category']))->get()
        ]);
    }

    public function show(Menu $menu)
    {
        // Ambil menu tambahan dari database, misalnya 3 menu tambahan
        $additionalMenus = Menu::where('id', '!=', $menu->id)->limit(3)->get();

        return view('itemMenu', [
            "title" => "Item Menu",
            "menu" => $menu, // Kirim menu utama
            "additionalMenus" => $additionalMenus // Kirim menu tambahan
        ]);
    }

}
