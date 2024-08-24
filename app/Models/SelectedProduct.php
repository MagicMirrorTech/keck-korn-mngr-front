<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}
