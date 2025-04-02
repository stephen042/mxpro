<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReceiveController extends Controller
{
    public function receive()
    {
        return view('user.receive');
    }

    public function receiveHistory()
    {
        // Fetch the receive history from the database or any other source
        $deposits = User::find(Auth::user()->id)->receives()->latest()->paginate(10);
        return view('user.receive-history',[
            'deposits' => $deposits,
        ]);
    }
}
