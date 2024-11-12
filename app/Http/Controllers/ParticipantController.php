<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function showForm()
    {
        return view('admin.check-in-form');
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
        Participant::create($request->all());

        // return redirect()->route('participant.showForm')->with('success', 'Check-in successful!');
        // Redirect to the success page
        return redirect()->route('participant.success');
    }

   
}

