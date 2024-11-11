<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Shareholder;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function edit($id) {
        $meeting = Meeting::findOrFail($id);
        return view('meetings.edit', compact('meeting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'meeting_date' => 'required|date',
            'status' => 'required|in:open,closed',
        ]);

        Meeting::create($request->all());
        return redirect()->route('meetings.index');
    }

    public function recordAttendance(Request $request, $meetingId)
    {
        $shareholders = Shareholder::all();
        $meeting = Meeting::findOrFail($meetingId);
        if ($meeting->status !== 'open') {
            return back()->withErrors(['error' => 'Cannot record attendance for a closed meeting.']);
        }
        // Check if 'attendees' is an array and has elements
        if (is_array($request->attendees) && count($request->attendees) > 0) {
            foreach ($request->attendees as $shareholderId) {
                Attendance::updateOrCreate(
                    ['shareholder_id' => $shareholderId, 'meeting_id' => $meetingId],
                    ['attended' => true]
                );
            }

            return back()->with('success', 'Attendance recorded.');
        } else {
            return back()->withErrors(['error' => 'No attendees selected.']);
        }

        return back()->with('success', 'Attendance recorded.');
    }

    public function showRecordAttendanceForm($meetingId)
    {
        // Fetch meeting data
        $meeting = Meeting::findOrFail($meetingId);

        // Fetch all shareholders
        $shareholders = Shareholder::all();

        // Check if meeting status is 'open', so attendance can be recorded
        if ($meeting->status !== 'open') {
            return back()->withErrors(['error' => 'Cannot record attendance for a closed meeting.']);
        }

        // Return the view with the meeting and shareholders
        return view('meetings.record_attendance', compact('meeting', 'shareholders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meeting_date' => 'required|date',
            'status' => 'required|in:open,closed',
        ]);

        $meetings = Meeting::findOrFail($id);
        $meetings->update($request->all());
        return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
    }
    
}
