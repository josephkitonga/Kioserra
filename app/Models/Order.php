<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="Order",
 *   type="object",
 *   required={"store_id", "customer_id", "product_ids", "total_price", "payment_method", "status"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="customer_id", type="integer"),
 *   @OA\Property(property="product_ids", type="string", description="JSON array of product IDs"),
 *   @OA\Property(property="total_price", type="number", format="float"),
 *   @OA\Property(property="payment_method", type="string", enum={"mpesa", "card", "cash"}),
 *   @OA\Property(property="status", type="string", enum={"pending", "complete", "delivered", "cancelled"}),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'customer_id',
        'product_ids',
        'total_price',
        'payment_method',
        'status'
    ];
}
