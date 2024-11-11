<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Shareholder;
use App\Models\Meeting;

class AttendanceController extends Controller
{
    public function index()
    {
        // Get all shareholders
        $shareholders = Shareholder::all();

        // Get all attendance records (filter by meeting_id if applicable)
        $attendances = Attendance::all();

        // Prepare an array of shareholder IDs who have attended
        $attendedShareholders = $attendances->pluck('shareholder_id')->toArray();

        return view('attendances.index', compact('shareholders', 'attendedShareholders'));
        // $shareholders = Shareholder::all();
        // $attendances = Attendance::all();
        // return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        // $shareholders = Shareholder::all();
        // // return view('shareholders.index', compact('shareholders'));
        // return view('attendances.create', compact('shareholders'));
        // Get the IDs of shareholders who have already attended
        $attendedShareholderIds = Attendance::pluck('shareholder_id')->toArray();

        // Exclude those shareholders from the list
        $shareholders = Shareholder::whereNotIn('id', $attendedShareholderIds)->get();

        return view('attendances.create', compact('shareholders'));
    }

    public function store(Request $request)
    {

        // Validate that the shareholder exists
        $validated = $request->validate([
            'shareholder_id' => 'required|exists:shareholders,id', // Ensure shareholder exists
        ]);

        // Get the currently open meeting (assuming only one open meeting can exist at a time)
        $meeting = Meeting::where('status', 'open')->first();

        if (!$meeting) {
            // If there is no open meeting, return an error (or handle it in your UI)
            return redirect()->route('attendances.index')->with('error', 'No open meeting found.');
        }

        // Create the attendance record
        Attendance::create([
            'meeting_id' => $meeting->id,            // Use the open meeting ID
            'shareholder_id' => $validated['shareholder_id'], // Use the shareholder ID from the form
            'present' => true,                        // Present is always true by default
        ]);

        // Redirect back to the index (or wherever you need)
        return redirect()->route('attendances.create')->with('success', 'Attendance recorded successfully.');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->route('attendances.index');
    }
}
