<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SalesReport;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    // Display a listing of the menu
    public function index()
    {
        $menus = Menu::all(); // Mengambil semua data menu
        return view('salesreport.index', compact('menus')); // Menampilkan ke view
    }
    // Show the form for creating a new menu
    public function create()
    {
        // Menampilkan form untuk membuat menu baru
        return view('salesreport.create');
        
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
        $salesReport = SalesReport::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('salesreport.index')
            ->with('success', 'Menu created successfully');
    }

    // Display a specific menu
    public function show(SalesReport $salesReport)
    {
        // Menampilkan detail menu tertentu
        return view('salesreport.show', compact('salesreport'));
    }

    // Show the form for editing a menu
    public function edit(SalesReport $salesReport)
    {
        // Menampilkan form edit untuk menu tertentu
        return view('salesreport.edit', compact('salesreport'));
    }

    // Update a menu
    public function update(Request $request, SalesReport $salesReport)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Update data menu
        $salesReport->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('salesreport.index')
            ->with('success', 'Menu updated successfully');
    }

    // Remove a menu
    public function destroy(SalesReport $salesReport)
    {
        // Hapus menu dari database
        $salesReport->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard')
            ->with('success', 'Menu deleted successfully');
    }
}
