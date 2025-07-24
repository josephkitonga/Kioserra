<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="Payment",
 *   type="object",
 *   required={"store_id", "amount", "status"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="amount", type="number", format="float"),
 *   @OA\Property(property="status", type="string", enum={"pending", "success", "failed"}),
 *   @OA\Property(property="mpesa_ref", type="string", nullable=true),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'amount',
        'status',
        'mpesa_ref'
    ];
}
