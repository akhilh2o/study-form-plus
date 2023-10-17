<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function discountSymbol()
    {
        if ($this->discount_type == 'flat') {
            return '';
        } else {
            return "%";
        }
    }

    public function getDiscount($amt)
    {
        if ($this->discount_type == 'flat') {
            return $this->discount;
        } else {
            return $amt - round($amt / $this->discount);
        }
    }
    public function discount($amt)
    {
        if ($this->discount_type == 'flat') {
            return $this->discount;
        } else {
            return  round($amt / $this->discount);
        }
    }
}
