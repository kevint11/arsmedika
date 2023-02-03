<?php

namespace App\Listeners;

use App\Events\PembayaranEvent;
use App\Models\PembayaranLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class PembayaranEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PembayaranEvent  $event
     * @return void
     */
    public function handle(PembayaranEvent $event)
    {
        PembayaranLog::create([
            'pembayaran_id' => $event->pembayaran->id,
            'event_type' => $event->eventType,
            'user_id' => Auth::id(),
        ]);
    }
}
