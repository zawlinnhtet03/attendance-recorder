<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\ParticipantSession;

class ParticipantController extends Controller
{
    public function showForm()
    {
        return view('admin.check-in-form');
    }

    public function showCheckOutForm()
    {
        return view('admin.check-out-form');
    }
 
    public function showAskCheckIn()
    {
        return view('admin.ask-check-in');
    }

    public function showOnlyCheckOut()
    {
        return view('admin.only-check-out');
    }

    public function handleCheckInOrCheckOut(Request $request)
    {
        $request->validate([
            'check_in_status' => 'required|in:yes,no',
        ]);

        $checkInStatus = $request->input('check_in_status');

        if ($checkInStatus == 'yes') {
            // If already checked in, redirect to the check-out form
            return redirect()->route('participant.showCheckOutForm');
        } else {
            // If not checked in yet, redirect to the check-in form
            return redirect()->route('participant.showOnlyCheckOut');
        }
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone_number' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9]{7,15}$/' // Example regex: allows optional "+" and 7-15 digits
            ],
            'is_nuclear_medicine_member' => 'required|boolean', // For Yes/No field
            'occupation_category' => 'nullable|string|max:255', // Occupation category, nullable
            'license_number' => 'nullable|string|max:255', // License number, nullable
            'is_medical_specialist_member' => 'required|boolean', // For Yes/No field
            'work_registration_number' => 'nullable|string|max:255', // Work registration number, nullable
        ]);

        // Create a new participant record
        $participant = Participant::create($request->all());  // Store the created participant

        // Create a new session for the participant, marking their check-in time
        $participantSession = new ParticipantSession();
        $participantSession->participant_id = $participant->id;  // Use the correct participant id
        $participantSession->check_in_time = now();
        $participantSession->save();

        // Redirect to the success page
        return redirect()->route('participant.success');
    }

    public function storeCheckOut(Request $request)
    {
        // Validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone_number' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9]{7,15}$/' // Example regex: allows optional "+" and 7-15 digits
            ],
            'is_nuclear_medicine_member' => 'required|boolean', // For Yes/No field
            'occupation_category' => 'nullable|string|max:255', // Occupation category, nullable
            'license_number' => 'nullable|string|max:255', // License number, nullable
            'is_medical_specialist_member' => 'required|boolean', // For Yes/No field
            'work_registration_number' => 'nullable|string|max:255', // Work registration number, nullable
        ]);

        // Create a new participant record
        $participant = Participant::create($request->all());  // Store the created participant

        // Create a new session for the participant, marking their check-in time
        $participantSession = new ParticipantSession();
        $participantSession->participant_id = $participant->id;  // Use the correct participant id
        $participantSession->check_out_time = now();
        $participantSession->save();

        // Redirect to the success page
        return redirect()->route('participant.successCheckOutOnly');
    }

    public function logout(Request $request)
    {
        // Validate email input
        $request->validate([
            'email' => 'required|email|exists:participants,email', // Check if email exists in the participants table
        ]);

        // Find the participant by their email
        $participant = Participant::where('email', $request->input('email'))->first();

        if ($participant) {
            // Find the most recent session for this participant where check-out time is not set
            $session = ParticipantSession::where('participant_id', $participant->id)
                ->whereNull('check_out_time') // Only the session with no check-out time
                ->latest() // Get the latest session
                ->first();

            if ($session) {
                // Update the check-out time
                $session->check_out_time = now();
                $session->save();

                // Redirect to success page
                return redirect()->route('participant.successCheckout');
            } else {
                return redirect()->route('participant.successCheckout')->with('error', 'No active session found for this participant.');
            }
        } else {
            return redirect()->route('participant.successCheckout')->with('error', 'Participant not found.');
        }
    }  
}
