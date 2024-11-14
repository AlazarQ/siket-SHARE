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

        $attendances = Attendance::all();

        $attendedShareholders = $attendances->pluck('shareholder_id')->toArray();

        return view('attendances.index', compact('shareholders', 'attendedShareholders'));
    }

    public function create()
    {
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
            return redirect()->route('attendances.create')->with('error', 'No open meeting found.');
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

    public function showAttendanceStats()
{
    // Get the currently open meeting
    $meeting = Meeting::where('status', 'open')->first();

    if (!$meeting) {
        // If there's no open meeting, return an error
        return redirect()->route('attendances.index')->with('error', 'No open meeting found.');
    }

    // Safely access the created_at property after checking if the meeting exists
    $meetingDate = $meeting->meeting_date ? $meeting->meeting_date : 'N/A';  // Default to 'N/A' if created_at is null

    // Get the current date and time
    $currentDateTime = now()->format('Y-m-d H:i:s'); // You can change the format as per your needs

    // Get the number of attendees for the open meeting
    $attendeesCount = Attendance::where('meeting_id', $meeting->id)->count();

    // Pass the data to the view
    return view('attendances.stats', compact('attendeesCount', 'currentDateTime', 'meeting'));

}


    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->route('attendances.index');
    }
}
