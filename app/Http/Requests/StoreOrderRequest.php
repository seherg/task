<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\License;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'    => ['required', 'integer', 'exists:users,id'],
            'product_id' => [
                'required',
                'integer',
                'exists:products,id',
                function ($attribute, $value, $fail) {
                    $available = License::where('product_id', $value)
                        ->whereNull('user_id')
                        ->exists();

                    if (!$available) {
                        $fail('Bu ürün için stokta lisans bulunmamaktadır.');
                    }
                },
            ],
        ];
    }
}