<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    
    public function trade()
    {
        return view('user.trade');
    }

    public function tradeHistory()
    {
        // Fetch trade history from the database or any other source
        $trades = User::find(Auth::user()->id)->trades()->latest()->paginate(10);

        return view('user.trade-history',[
            'trades' => $trades,
        ]);
    }
}
