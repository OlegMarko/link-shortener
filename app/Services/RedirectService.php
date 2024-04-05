<?php

namespace App\Services;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class RedirectService
{
    /**
     * Handle the redirect request.
     *
     * @param string $token
     * @return RedirectResponse
     *
     * @throws ModelNotFoundException
     */
    public function redirect(string $token): RedirectResponse
    {
        $link = Link::where('token', $token)->firstOrFail();

        if (Carbon::now()->gt($link->expiration_time)) {
            throw (new ModelNotFoundException)->setModel(Link::class);
        }

        if ($link->max_count !== 0) {
            $diff = $link->max_count - $link->redirect_count;
            if ($diff <= 0) {
                throw (new ModelNotFoundException)->setModel(Link::class);
            }

            $link->redirect_count++;
            $link->save();
        }

        return redirect()->away($link->original_url);
    }
}
