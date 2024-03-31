<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    /**
     * Handle the redirect request.
     */
    public function __invoke(string $token): RedirectResponse
    {
        $link = Link::where('token', $token)->firstOrFail();

        if (Carbon::now()->gt($link->expiration_time)) {
            return throw (new ModelNotFoundException)->setModel(Link::class);
        }

        if ($link->max_count !== 0) {
            $diff = $link->max_count - $link->redirect_count;
            if ($diff <= 0) {
                return throw (new ModelNotFoundException)->setModel(Link::class);
            }

            $link->redirect_count++;
            $link->save();
        }

        return redirect()->away($link->original_url);
    }
}
