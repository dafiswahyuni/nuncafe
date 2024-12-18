<?php

namespace App\Http\Controllers;

use App\Models\SalesReport;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    // Display a listing of sales reports
    public function index()
    {
        return SalesReport::all();
    }

    // Show the form for creating a new report
    public function create()
    {
        // Not used for APIs, usually handled on the frontend.
    }

    // Store a newly created report
    public function store(Request $request)
    {
        $request->validate([
            'total_sales' => 'required|numeric|min:0',
            'report_date' => 'required|date',
        ]);

        $report = SalesReport::create($request->all());

        return response()->json(['message' => 'Sales report created successfully', 'data' => $report], 201);
    }

    // Display a specific report
    public function show(SalesReport $salesReport)
    {
        return $salesReport;
    }

    // Update a report
    public function update(Request $request, SalesReport $salesReport)
    {
        $request->validate([
            'total_sales' => 'required|numeric|min:0',
            'report_date' => 'required|date',
        ]);

        $salesReport->update($request->all());

        return response()->json(['message' => 'Sales report updated successfully', 'data' => $salesReport]);
    }

    // Remove a report
    public function destroy(SalesReport $salesReport)
    {
        $salesReport->delete();

        return response()->json(['message' => 'Sales report deleted successfully']);
    }
}
