<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type_id', 'serial_number', 'brand',
        'quantity', 'date_purchase', 'asset_status',
        'delivery_date'
    ];

    public function assetType()
    {
        return $this->belongsTo(AssetType::class, 'type_id');
    }
}
