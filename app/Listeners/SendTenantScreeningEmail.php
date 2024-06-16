<?php

namespace App\Listeners;

use App\Events\TenantScreeningSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\TenantScreeningEmail; // Assuming you have a Mail class set up

class SendTenantScreeningEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TenantScreeningSaved $event)
    {
        $tenantscreening = $event->tenantscreening; // Access the TenantScreening model from event

        $tenantEmail = $tenantscreening->tenant_email;

        // Example of sending email using Laravel Mail
        Mail::to($tenantEmail)->send(new TenantScreeningEmail($tenantscreening));
    }
}
