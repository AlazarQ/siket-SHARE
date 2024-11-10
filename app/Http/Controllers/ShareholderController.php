<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
use Illuminate\Http\RedirectResponse;

class ShareholderController extends Controller
{
    // Display the list of shareholders
    public function index()
    {
        // Fetch all shareholders
        $shareholders = Shareholder::all();

        // Pass shareholders data to the view
        return view('dashboard', compact('shareholders'));
    }

    // Show the form to register a new shareholder
    public function create()
    {
        return view('shareholders.create');
    }

    // Store the new shareholder information
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:15',
            'shCountry' => 'required|string|max:100',
            'shNationality' => 'required|string|max:100',
            'shares' => 'required|numeric|min:0',
            'shareholder_documents' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'remark' => 'required|string|max:500',
        ]);

        // Handle file upload (shareholder documents)
        if ($request->hasFile('shareholder_documents')) {
            $documentPath = $request->file('shareholder_documents')->store('shareholder_documents', 'public');
        }

        $request->user()->shareholders->create($validated);

        // Redirect with success message
        return redirect()->route('shareholders.create')->with('success', 'Shareholder registered successfully!');
    }

    public function edit($id)
    {
        $shareholder = Shareholder::findOrFail($id);
        return view('shareholders.edit', compact('shareholder'));
    }

    // Update the shareholder information
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:shareholders,email,' . $id,
            'shares' => 'required|numeric',
        ]);

        $shareholder = Shareholder::findOrFail($id);
        $shareholder->update($request->all());

        return redirect()->route('shareholders.index')->with('success', 'Shareholder updated successfully!');
    }

    // Delete a shareholder
    public function destroy($id)
    {
        $shareholder = Shareholder::findOrFail($id);
        $shareholder->delete();

        return redirect()->route('shareholders.index')->with('success', 'Shareholder deleted successfully!');
    }
}
