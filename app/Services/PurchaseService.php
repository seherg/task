<?php

namespace App\Services;

use App\Models\License;
use App\Jobs\SendLicenseEmailJob;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    public function purchase(int $userId, int $productId): License
    {
        return DB::transaction(function () use ($userId, $productId) {
            $license = License::where('product_id', $productId)
                ->whereNull('user_id')
                ->lockForUpdate()
                ->firstOrFail();

            $license->update(['user_id' => $userId]);

            SendLicenseEmailJob::dispatch($license);

            return $license;
        });
    }
}