<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paketnew;
// use App\Models\Subscription;
use App\Models\Subs;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class SubscriptionController extends Controller
{
    public function index()
    {
        $packages = Paketnew::all();
        return view('dashboard', compact('packages'));
    }

    public function subscribe($id)
    {
        $package = Paketnew::findOrFail($id);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => $package->price,
        ];

        $customer_details = [
            'first_name' => Auth::user()->username,
            'email' => Auth::user()->email,
        ];

        $custom_field1 = $package->duration;
        $custom_field2 = Auth::user()->id;

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'custom_field1' => $custom_field1,
            'custom_field2' => $custom_field2,
        ];

        $snapToken = Snap::getSnapToken($params);

        // Subscription::create([
        //     'user_id' => Auth::id(),
        //     'package_id' => $package->id,
        //     'transaction_id' => $transaction_details['order_id'],
        //     'status' => 'pending',
        // ]);
        Subs::create([
            'user_id' => Auth::id(),
            'username' => Auth::user()->username,
            'package_id' => $package->id,
            'duration' => $package->duration,
            'transaction_id' => $transaction_details['order_id'],
            'status' => 'pending',
        ]);

        return response()->json(['snapToken' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512",
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($hashed == $request->signature_key) {

            // $subscription = Subscription::where('transaction_id', $request->order_id)->first();

            // if ($request->transaction_status == 'settlement') {

            //     $subscription->update([
            //         'status' => 'active',
            //         'start_date' => now(),
            //         'end_date' => now()->addMonth(),
            //     ]);
            // }
            //ambil data dari tabel userStatus berdasarkan id
            $userStatus = UserStatus::where('user_id', $request->custom_field2)->first();

            $subs = Subs::where('transaction_id', $request->order_id)->first();
            $user = User::find($request->order_id);
            
            //ambil durasi
            $status = $request->transaction_status;
            $orderId = $request->order_id;
            $duration = $request->custom_field1;
            

            if ($request->transaction_status == 'settlement') {

                // Cek menggunakan operator Ternary
                // // Jika user sudah punya masa aktif, tambah dari tanggal expired. 
                // // Jika belum, tambah dari hari ini.
                $currentExpiry = $subs->end_date ? Carbon::parse($subs->end_date) : Carbon::now();
                $newExpiry = $currentExpiry->addDays($duration);

                $subs->update([
                    'status' => 'paid',
                    'start_date' => now(),
                    'end_date' => $newExpiry,
                ]);
                $userStatus->update([
                    'status' => 'Active',
                    'end_date' => $newExpiry,
                ]);

                // $user->update(['expired_at' => $newExpiry]);

                // Log::info("User {$user->id} diperpanjang {$duration} hari.");
            }
        }
    }
}