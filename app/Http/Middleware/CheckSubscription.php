<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class CheckSubscription
{
    public function handle($request, Closure $next)
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->whereDate('end_date', '>=', now())
            ->first();

        if (!$subscription) {
            return redirect('/dashboard')
                ->with('error', 'Subscription tidak aktif atau sudah expired.');
        }

        return $next($request);
    }
}
