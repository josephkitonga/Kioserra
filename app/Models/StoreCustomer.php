<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="StoreCustomer",
 *   type="object",
 *   required={"store_id", "customer_email", "name"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="customer_email", type="string"),
 *   @OA\Property(property="name", type="string"),
 *   @OA\Property(property="credit_limit", type="number", format="float"),
 *   @OA\Property(property="credit_used", type="number", format="float"),
 *   @OA\Property(property="repayment_date", type="string", format="date-time", nullable=true),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class StoreCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'customer_email',
        'name',
        'credit_limit',
        'credit_used',
        'repayment_date'
    ];
}
