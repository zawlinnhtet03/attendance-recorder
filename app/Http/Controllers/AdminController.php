<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users() {
        return view('admin.users');
    }

    public function generateQrCode()
    {
        $qrData = 'http://192.168.1.7:8000/check-in-form';
        return view('admin.qr-code', ['qrCode' => QrCode::size(250)->generate($qrData)]);
    }

    public function generateLogoutQrCode()
    {
        $qrData = route('participant.successCheckout'); // This will link to your logout route
        return view('admin.logout-qr-code', ['qrCode' => QrCode::size(250)->generate($qrData)]);
    }

    // public function showCheckInForm(Request $request)
    // {
    //     return view('admin.check-in-form');
    // }


    // public function checkIn(Request $request)
    // {
    //     $user = $request->user();

    //     if ($user->check_in) {
    //         return redirect()->back()->with('message', 'You have already checked in.');
    //     }

    //     $user->check_in = now();
    //     $user->save();

    //     return redirect()->back()->with('success', 'Check-in successful!');
    // }

    // public function checkOut(Request $request)
    // {
    //     $user = $request->user();

    //     if (!$user->check_in || $user->check_out) {
    //         return redirect()->back()->with('message', 'Check-out not allowed.');
    //     }

    //     $user->check_out = now();
    //     $user->save();

    //     return redirect()->back()->with('success', 'Check-out successful!');
    // }


}
