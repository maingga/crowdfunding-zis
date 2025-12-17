<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createPayment($donation_id)
    {
        $donation = Donation::with('user','program')->findOrFail($donation_id);

        $params = [
            'transaction_details' => [
                'order_id' => 'DON-'.$donation->donation_id.'-'.time(),
                'gross_amount' => $donation->nominal,
            ],
            'customer_details' => [
                'first_name' => $donation->user?->nama ?? 'Anonim',
                'email' => $donation->user?->email ?? 'anonim@example.com',
            ],
            'enabled_payments' => ['gopay','bank_transfer','credit_card'],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token'=>$snapToken]);
    }
}
