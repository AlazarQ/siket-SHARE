<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ShareholderController extends Controller
{
    public function index(Request $request)
    {
        // Get search parameters from the request
        $searchText = $request->get('search_text');
        $searchColumn = $request->get('search_column', 'name');  // Default to 'name'
        $operand = $request->get('operand', 'like');  // Default to 'like'

        $query = Shareholder::query();

        if ($searchText) {
            if ($operand == 'like') {
                $query->where($searchColumn, 'like', '%' . $searchText . '%');
            } elseif ($operand == '=') {
                $query->where($searchColumn, '=', $searchText);
            }
        }

        $shareholders = $query->paginate(5);

        return view('shareholders.index', compact('shareholders'));
    }

    public function create()
    {
        return view('shareholders.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:shareholders',
            'address' => 'required|string|max:200',
            'country' => 'required|string|max:100',
            'nationality' => 'required|string|max:100',
            'shares' => 'required|numeric|min:0',
            'sharesPaid' => 'required|numeric|min:0',
            'shareholder_documents' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'remark' => 'required|string|max:500',
            // 'user_id' => '1', // Assuming you're assigning the user_id statically
        ]);

        // Initialize document path to null in case there's no file uploaded
        $documentName = null;

        // Handle file upload (shareholder documents)
        if ($request->hasFile('shareholder_documents')) {
            
            $documentName = $request->file('shareholder_documents')->getClientOriginalName();

            
            $path = $request->file('shareholder_documents')->storeAs('shareholder_documents', $documentName, 'public');
        }

        
        Shareholder::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'nationality' => $request->input('nationality'),
            'shares' => $request->input('shares'),
            'sharesPaid' => $request->input('sharesPaid'),
            'remark' => $request->input('remark'),
            // 'user_id' => '1', //$request->input('user_id')
            'shareholder_documents' => $documentName,  // Save only the file name
        ]);

        return redirect()->route('shareholders.index');
    }

    public function edit($id)
    {
        $shareholder = Shareholder::findOrFail($id);
        return view('shareholders.edit', compact('shareholder'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:shareholders,email,' . $id, // Exclude current record from the unique check
            'address' => 'required|string|max:200',
            'country' => 'required|string|max:100',
            'nationality' => 'required|string|max:100',
            'shares' => 'required|numeric|min:0',
            'sharesPaid' => 'required|numeric|min:0'
        ]);

        $shareholder = Shareholder::find($id);

        if (!$shareholder) {
            return redirect()->route('shareholders.index')->with('error', 'Shareholder not found.');
        }

        // Initialize document path to null in case there's no file uploaded
        $documentName = null;

        // Handle file upload (shareholder documents)
        if ($request->hasFile('shareholder_documents')) {
            // Get the original file name with extension
            $documentName = $request->file('shareholder_documents')->getClientOriginalName();

            // Store the file in the 'public/shareholder_documents' folder (creates the folder if it doesn't exist)
            $path = $request->file('shareholder_documents')->storeAs('shareholder_documents', $documentName, 'public');
        }

        // Update the shareholder's fields
        $shareholder->update($request->only([
            'name',
            'phone',
            'email',
            'address',
            'country',
            'nationality',
            'shares',
            'sharesPaid'
        ]));

        return redirect()->route('shareholders.index')->with('success', 'Shareholder updated successfully');
    }

    public function destroy($id)
    {
        Shareholder::findOrFail($id)->delete();
        return redirect()->route('shareholders.index')->with('success', 'Record Updated!!');
    }
}
