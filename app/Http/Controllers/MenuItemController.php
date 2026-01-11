<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class MenuItemController extends Controller
{
    /**
     * Display the Dashboard listing of the Menu Items (the primary management page).
     */
public function index(Request $request)
{
    // 1. Initialize the Query Builder (Do NOT call ->get() yet)
    $query = MenuItem::with('category');

    // 2. Apply Search Filter if the user typed something
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');

        // We wrap the OR logic in a closure function to prevent logic errors
        $query->where(function($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('description', 'like', "%{$searchTerm}%")
              ->orWhere('price', 'like', "%{$searchTerm}%"); 
        });
    }

    // 3. Apply Category Filter if a category is selected
    if ($request->filled('category_id') && $request->category_id != '') {
        $query->where('category_id', $request->category_id);
    }

    // 3. Execute the query to get the filtered results
    $menuItems = $query->latest()->get();
    // --- The rest of your code remains the same ---
    // Get all Categories for the dropdown
    $categories = Category::all();

    // Required Feature 2A: Statistics
    $totalItems = MenuItem::count();
    $totalCategories = Category::count();
    $averagePrice = MenuItem::avg('price');

    return view('dashboard', compact(
        'menuItems',
        'categories',
        'totalItems',
        'totalCategories',
        'averagePrice'
    ));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Required: Form validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // category_id is optional due to the nullable foreign key requirement
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('menuItems-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }
        
        MenuItem::create($validatedData);

        // Required: Success message
        return redirect()->route('dashboard')->with('success', 'Menu Item added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        // Required: Form validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        // Handle photo upload if a new photo is provided
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($menuItem->photo) {
                Storage::disk('public')->delete($menuItem->photo);
            }
            // Store new photo
            $photoPath = $request->file('photo')->store('menuItems-photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $menuItem->update($validatedData);

        // Required: Success message
        return redirect()->route('dashboard')->with('success', 'Menu Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        // Required: Success message
        return redirect()->route('dashboard')->with('success', 'Menu Item successfully move to trash.');
    }

    public function trash() {

        $menuItems = MenuItem::onlyTrashed()->with('category')->latest('deleted_at')->get();
        $categories = Category::all();

        return view('trash', compact('menuItems', 'categories'));
    }
    public function restore($id) {
        $menuItem = MenuItem::withTrashed()->findOrFail($id);
        $menuItem->restore();

        return redirect()->route('menu-items.trash')->with('success', 'Menu Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        $menuItem = MenuItem::withTrashed()->findOrFail($id);

        if ($menuItem->photo) {
            Storage::disk('public')->delete($menuItem->photo);
        }

        $menuItem->forceDelete();

        return redirect()->route('menu-items.trash')->with('success', 'Menu Item Permanently Deleted');
    }

/**
     * Export the Menu Items to PDF using native Dompdf.
     */
    public function export(Request $request)
    {
        // 1. Build Query (Same filters as Index so export matches view)
        $query = MenuItem::with('category');

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%")
                  ->orWhere('price', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // 2. Get Data
        $menuItems = $query->latest()->get();

        // 3. Define Filename
        $filename = 'menu_items_export_' . date('Y-m-d_His') . '.pdf';

        // 4. Build HTML
        $html = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Menu Items Export</title>
            <style>
                body { font-family: Arial, sans-serif; padding: 20px; background-color: #f5f5f5; }
                .container { max-width: 100%; margin: 0 auto; background-color: white; padding: 30px; }
                h1 { color: #333; text-align: center; margin-bottom: 10px; }
                .export-info { text-align: center; color: #666; margin-bottom: 30px; font-size: 14px; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                th { background-color: #4472C4; color: white; padding: 12px; text-align: left; font-weight: bold; border: 1px solid #2e5c9a; }
                td { padding: 10px 12px; border: 1px solid #ddd; font-size: 14px; }
                tr:nth-child(even) { background-color: #f9f9f9; }
                .footer { margin-top: 20px; padding: 15px; background-color: #f0f0f0; border-radius: 5px; text-align: center; font-weight: bold; color: #333; }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Menu Items Report</h1>
                <div class="export-info">
                    Exported on: ' . date('F d, Y \a\t h:i A') . '<br>
                    Total Items: ' . $menuItems->count() . '
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th style="width: 20%">Item Name</th>
                            <th style="width: 10%">Price</th>
                            <th style="width: 15%">Category</th>
                            <th style="width: 35%">Description</th>
                            <th style="width: 15%">Date Added</th>
                        </tr>
                    </thead>
                    <tbody>';

        $number = 1;
        foreach ($menuItems as $item) {
            $categoryName = $item->category ? $item->category->name : 'Uncategorized';
            $price = number_format($item->price, 2);
            $desc = $item->description ? htmlspecialchars(substr($item->description, 0, 100)) : '-'; // Limit desc length

            $html .= '<tr>
                    <td style="text-align: center">' . $number++ . '</td>
                    <td>' . htmlspecialchars($item->name) . '</td>
                    <td>$' . $price . '</td>
                    <td>' . htmlspecialchars($categoryName) . '</td>
                    <td>' . $desc . '</td>
                    <td>' . $item->created_at->format('Y-m-d') . '</td>
                </tr>';
        }

        $html .= '</tbody>
                </table>

                <div class="footer">
                    Total Menu Items: ' . $menuItems->count() . ' | Average Price: $' . number_format($menuItems->avg('price'), 2) . '
                </div>
            </div>
        </body>
        </html>';

        // 5. Generate PDF using native Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // Set paper to Landscape to fit the columns better
        $dompdf->setPaper('A4', 'landscape'); 
        
        $dompdf->render();

        return $dompdf->stream($filename, ['Attachment' => true]);
    }

}