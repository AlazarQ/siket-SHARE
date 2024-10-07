<?php

namespace App\Http\Controllers;

use App\Models\CustomerRequests;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customerRequest.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $response = Http::get('https://67006e0f4da5bd23755406cc.mockapi.io/api/v1/rate/currencyExc/1');
        $response = Http::withoutVerifying()->get('https://67006e0f4da5bd23755406cc.mockapi.io/api/v1/rate/currencyExc/1');

        $data = $response->json();


        return view('customerRequest.create', [
            'exchangeRate' => $data['rate']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerRequests $customerRequests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerRequests $customerRequests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerRequests $customerRequests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerRequests $customerRequests)
    {
        //
    }
}
