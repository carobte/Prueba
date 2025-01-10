<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // Show all expenses with optional filters
    public function index(Request $request)
    {
        $categories = Category::all(); // Recupera todas las categorías
        $expenses = Expense::query();

        // Filters 
        if ($request->has('category') && $request->category != '') {
            $expenses->where('category_id', $request->category);
        }

        if ($request->has('start_date') && $request->start_date != '') {
            $expenses->where('date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $expenses->where('date', '<=', $request->end_date);
        }

        $expenses = $expenses->get();

        // Total spent by category
        $categoryTotals = $expenses->groupBy('category_id')->map(function ($categoryExpenses) {
            return $categoryExpenses->sum('amount');
        });

        // Total expenses
        $total = $expenses->sum('amount');

        return view('expenses.index', compact('expenses', 'categories', 'categoryTotals', 'total'));
    }


    // Show the form to create a new expense
    public function create()
    {
        // Get categories for the select (form in view)
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    // Store a new expense
    public function store(Request $request)
    {
        // Form data validation
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);

        // Create the expense
        Expense::create([
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'category_id' => $validated['category_id'],
            'date' => $validated['date'],
        ]);

        // Redirect to the expenses list with a success message
        return redirect()->route('expenses.index')->with('success', 'Gasto creado exitosamente');
    }

    // Show the form to edit an existing expense
    public function edit($id)
    {
        // Get the expense
        $expense = Expense::findOrFail($id);

        // Get all categories from the database
        $categories = Category::all();

        // Pass both the expense and categories to the view
        return view('expenses.edit', compact('expense', 'categories'));
    }

    // Update an existing expense
    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'category' => 'required|exists:categories,id', // Category must exists in database
            'date' => 'required|date',
        ]);

        // Find the expense
        $expense = Expense::findOrFail($id);

        // Update the expense
        $expense->description = $request->input('description');
        $expense->amount = $request->input('amount');
        $expense->category_id = $request->input('category'); // Update the correct category
        $expense->date = $request->input('date');

        // Save the updated expense
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Gasto actualizado exitosamente');
    }


    // Delete an expense
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Gasto eliminado exitosamente');
    }
}
