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
        'total',
        'method',
        'status',
    ];

    public function users()
    {
        $this->hasOne(User::class);
    }

    public function orderdetails()
    {
        $this->hasMany(Orderdetail::class);
    }
}
