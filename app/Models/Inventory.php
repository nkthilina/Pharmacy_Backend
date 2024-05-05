<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $fillable = [
        'item_name',
        'quantity',
        'stock',
        'unit',
        'price',
        'description',
        'expiry_date',
        'purchase_date'
    ];
}
