<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="Product",
 *   type="object",
 *   required={"name", "price", "store_id"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="name", type="string"),
 *   @OA\Property(property="price", type="number", format="float"),
 *   @OA\Property(property="image_url", type="string", nullable=true),
 *   @OA\Property(property="description", type="string", nullable=true),
 *   @OA\Property(property="store_id", type="integer"),
 *   @OA\Property(property="category", type="string", nullable=true),
 *   @OA\Property(property="available", type="boolean"),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image_url',
        'description',
        'store_id',
        'category',
        'available'
    ];
}
