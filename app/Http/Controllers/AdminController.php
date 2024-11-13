<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Models\Participant;

class AdminController extends Controller
{
    public function users()
    {
        // Participants who did both check-in and check-out
        $completedSessions = Participant::whereHas('sessions', function($query) {
            $query->whereNotNull('check_out_time');
        })->with('sessions')->get();

        // Participants who only did check-in
        $pendingSessions = Participant::whereHas('sessions', function($query) {
            $query->whereNull('check_out_time');
        })->with('sessions')->get();

        return view('admin.users', compact('completedSessions', 'pendingSessions'));
    }

    public function generateQrCode()
    {
        // php artisan serve --host=192.168.1.x --port=8000
        $qrData = 'http://192.168.1.7:8000/check-in-form';
        return view('admin.qr-code', ['qrCode' => QrCode::size(250)->generate($qrData)]);
    }

    public function generateLogoutQrCode()
    {
        // Assuming you pass the participant's email or unique ID as a query parameter
        // $qrData = route('participant.out') . '?email=' . urlencode('participant_email@example.com');
        $qrData = 'http://192.168.1.7:8000/check-out-form';
        return view('admin.logout-qr-code', ['qrCode' => QrCode::size(250)->generate($qrData)]);
    }
}
