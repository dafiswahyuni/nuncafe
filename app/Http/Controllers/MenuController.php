<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Display a listing of the menu
    public function index()
    {
        $menus = Menu::all(); // Mengambil semua data menu
        return view('menu.index', compact('menus')); // Menampilkan ke view
    }

    // Show the form for creating a new menu
    public function create()
    {
        // Menampilkan form untuk membuat menu baru
        return view('menu.create');
    }

    // Store a newly created menu
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Membuat menu baru
        $menu = Menu::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menu.index')
            ->with('success', 'Menu created successfully');
    }

    // Display a specific menu
    public function show(Menu $menu)
    {
        // Menampilkan detail menu tertentu
        return view('menu.show', compact('menu'));
    }

    // Show the form for editing a menu
    public function edit(Menu $menu)
    {
        // Menampilkan form edit untuk menu tertentu
        return view('menu.edit', compact('menu'));
    }

    // Update a menu
    public function update(Request $request, Menu $menu)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Update data menu
        $menu->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menu.index')
            ->with('success', 'Menu updated successfully');
    }

    // Remove a menu
    public function destroy(Menu $menu)
    {
        // Hapus menu dari database
        $menu->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menu.index')
            ->with('success', 'Menu deleted successfully');
    }
}
