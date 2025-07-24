<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="Subscription",
 *   type="object",
 *   required={"store_id", "start_date", "end_date", "amount_paid", "payment_method"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="start_date", type="string", format="date-time"),
 *   @OA\Property(property="end_date", type="string", format="date-time"),
 *   @OA\Property(property="amount_paid", type="number", format="float"),
 *   @OA\Property(property="payment_method", type="string"),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'start_date',
        'end_date',
        'amount_paid',
        'payment_method'
    ];
}
