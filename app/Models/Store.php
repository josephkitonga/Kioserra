<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *   schema="Store",
 *   type="object",
 *   required={"name", "slug", "owner_id", "status"},
 *   @OA\Property(property="id", type="integer", readOnly=true),
 *   @OA\Property(property="name", type="string"),
 *   @OA\Property(property="slug", type="string"),
 *   @OA\Property(property="logo_url", type="string", nullable=true),
 *   @OA\Property(property="owner_id", type="integer"),
 *   @OA\Property(property="trial_expiry", type="string", format="date-time", nullable=true),
 *   @OA\Property(property="status", type="string", enum={"active", "suspended"}),
 *   @OA\Property(property="whatsapp", type="string", nullable=true),
 *   @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *   @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'logo_url',
        'owner_id',
        'trial_expiry',
        'status',
        'whatsapp'
    ];
}
