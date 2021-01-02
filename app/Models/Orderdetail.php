<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    protected $fillable = [
        'orderlists_id',
        'products_id',
        'quantity',
        'price',
    ];

    public function orderlists()
    {
        $this->belongsTo(Orderlist::class);
    }

    public function products()
    {
        $this->hasOne(Product::class);
    }
}
