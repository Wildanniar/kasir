<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'type',        // IN / OUT
        'qty',
        'description'
    ];


    public function stockLogs()
    {
    return $this->hasMany(StockLog::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
