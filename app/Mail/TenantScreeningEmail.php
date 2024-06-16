<?php

namespace App\Mail;

use App\Models\TenantScreening;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TenantScreeningEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $tenantscreening;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TenantScreening $tenantscreening)
    {
        $this->tenantscreening = $tenantscreening;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tenant Screening Email')
                    ->view('emails.tenant-screening')
                    ->with([
                        'tenantscreening' => $this->tenantscreening,
                    ]);
    }
}
