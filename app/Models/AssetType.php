<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name', 'type_status',
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'type_id');
    }
}
