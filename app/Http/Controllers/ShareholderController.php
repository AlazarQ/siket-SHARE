<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shareholder;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; 

class ShareholderController extends Controller
{

    public function index()
    {
        $shareholders = Shareholder::all();
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
            'email' => 'required|email|unique:shareholders',
            'address' => 'required|string|max:200',
            'country' => 'required|string|max:100',
            'nationality' => 'required|string|max:100',
            'shares' => 'required|numeric|min:0',
            'sharesPaid' => 'required|numeric|min:0',
            'shareholder_documents' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'remark' => 'required|string|max:500',
            'user_id' => '1',
        ]);

        // Initialize document path to null in case there's no file uploaded
        $documentPath = null;
        //Handle file upload (shareholder documents)
        if ($request->hasFile('shareholder_documents')) {
            $documentPath = $request->file('shareholder_documents')->store('shareholder_documents', 'public');
        }
        
        
        Shareholder::create($request->all());
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
            'email' => 'required|email',
        ]);

        $shareholder = Shareholder::findOrFail($id);
        $shareholder->update($request->all());
        return redirect()->route('shareholders.index');
    }

    public function destroy($id)
    {
        Shareholder::findOrFail($id)->delete();
        return redirect()->route('shareholders.index');
    }
}
