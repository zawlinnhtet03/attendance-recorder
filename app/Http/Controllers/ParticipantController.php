<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import Auth
use App\Models\Participant;
use App\Models\ParticipantSession;
use Illuminate\Support\Facades\Session;

class ParticipantController extends Controller
{
    public function showForm()
    {
        return view('admin.check-in-form');
    }

    public function showCheckoutForm()
    {
        return view('admin.check-out-form');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone_number' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9]{7,15}$/' // Example regex: allows optional "+" and 7-15 digits
            ],
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


    // public function logout(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:participants,email',
    //     ]);
    
    //     $participant = Participant::where('email', $request->email)->first();
    
    //     if ($participant) {
    //         $session = ParticipantSession::where('participant_id', $participant->id)
    //             ->whereNull('check_out_time')
    //             ->latest()
    //             ->first();
    
    //         if ($session) {
    //             \Log::info('Session check-out triggered for participant:', ['id' => $participant->id]);
                
    //             $session->check_out_time = now();
    //             $session->save();
    
    //             return redirect()->route('participant.successCheckout');
    //         } else {
    //             return redirect()->back()->with('error', 'No active session found for this participant.');
    //         }
    //     }
    
    //     return redirect()->back()->with('error', 'Participant not found.');
    // }
    
}
