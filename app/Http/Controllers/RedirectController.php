<?php

namespace App\Http\Controllers;

use App\Services\RedirectService;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    /**
     * Handle the redirect request.
     *
     * @param RedirectService $redirectService
     * @param string $token
     *
     * @return RedirectResponse
     */
    public function __invoke(RedirectService $redirectService, string $token): RedirectResponse
    {
        return $redirectService->redirect($token);
    }
}
