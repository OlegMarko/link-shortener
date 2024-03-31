<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\SaveRequest;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Create Form
     *
     * @return View
     */
    public function create(): View
    {
        $links = Link::orderBy('expiration_time', 'DESC')->paginate(5);

        return view('links.index', compact('links'));
    }

    /**
     * Store Shorten Link
     *
     * @param SaveRequest $request
     *
     * @return RedirectResponse
     */
    public function store(SaveRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $currentDateTime = Carbon::now();
        $expirationDateTime = $currentDateTime
            ->addHours((int)$validatedData['expiration_hours'])
            ->addMinutes((int)$validatedData['expiration_minutes']);

        $data = array_merge($validatedData, [
            'token' => Str::random(8),
            'expiration_time' => $expirationDateTime
        ]);

        Link::create($data);

        return back()->with('success', 'Link shortened successfully!');
    }

    /**
     * Remove the link from storage.
     */
    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('links.create');
    }
}
