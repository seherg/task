<?php

namespace App\Jobs;

use App\Models\License;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendLicenseEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public License $license) {}

    public function handle(): void
    {
        Log::info('Lisans kullanıcıya iletildi.', [
            'user_id'     => $this->license->user_id,
            'license_key' => $this->license->license_key,
            'product_id'  => $this->license->product_id,
        ]);
    }
}