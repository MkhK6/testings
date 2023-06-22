<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function deleleWallet(Request $request, $id)
    {
        Wallet::destroy($id);
        return response('OK');
    }

    public function updateWallet(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'amount' => 'required|numeric',
            'type' => 'required|string',
        ]);


        $wallet = Wallet::find($validated['id']);

        if (is_null($wallet)) {
            return response('wallet not found', 400);
        }

        if($validated['type'] == 'deduction'){ 
            $wallet->amount -= $validated['amount'];
        }elseif($validated['type'] == 'addition'){
            $wallet->amount += $validated['amount'];
        }else{
            return response('error', 400);
        }
        
        $wallet->save();

        return response('OK');
    }
}
