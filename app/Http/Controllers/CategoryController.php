<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource (the secondary management page).
     * The Category page must show the count of related items.
     */
    public function index()
    {
        // Load categories and eagerly load the count of related menu items
        // using withCount('menuItems').
        $categories = Category::withCount('menuItems')->get();

        return view('categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Required: Form validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name', // Required, unique
            'description' => 'nullable|string',
        ]);

        Category::create($validatedData);

        // Required: Success message
        return redirect()->route('categories')->with('success', 'Menu Category created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Required: Form validation (excluding the current category from the unique check)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($validatedData);

        // Required: Success message
        return redirect()->route('categories')->with('success', 'Menu Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // Note: Due to onDelete('set null') in the migration,
            // any menu items belonging to this category will have their
            // category_id set to NULL automatically by the database.

            $category->delete();

            // Required: Success message
            return redirect()->route('categories')->with('success', 'Menu Category deleted successfully.');
        } catch (\Exception $e) {
            // Error handling, necessary if database constraints cause issues
            return redirect()->route('categories')->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }
}
