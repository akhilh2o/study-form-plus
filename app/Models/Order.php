<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function fullAddress()
    {
        return implode(', ', array_filter(array($this->address, $this->landmark, $this->city, $this->state, $this->pincode, $this->country)));
    }
}
