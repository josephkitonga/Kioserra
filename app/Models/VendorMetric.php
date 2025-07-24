<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="VendorMetric",
 *   type="object",
 *   required={"store_id", "product_count", "order_count", "status"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="product_count", type="integer"),
 *   @OA\Property(property="order_count", type="integer"),
 *   @OA\Property(property="last_login", type="string", format="date-time", nullable=true),
 *   @OA\Property(property="status", type="string", enum={"active", "suspended"}),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class VendorMetric extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'product_count',
        'order_count',
        'last_login',
        'status'
    ];
}
