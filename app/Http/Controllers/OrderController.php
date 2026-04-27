<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\LicenseResource;
use App\Services\PurchaseService;

class OrderController extends Controller
{
    public function __construct(private PurchaseService $purchaseService) {}

    public function store(StoreOrderRequest $request)
    {
        $license = $this->purchaseService->purchase(
            $request->user_id,
            $request->product_id
        );

        return new LicenseResource($license);
    }
}