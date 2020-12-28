<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    use HasFactory;

    protected $table = 'orderlists';

    protected $fillable = [
        'users_id',
        'products_id',
        'total',
        'status',
        'method',
    ];

    public function users()
    {
        $this->hasOne(User::class);
    }

    public function products()
    {
        $this->hasMany(Product::class);
    }
}
