<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'description', 
        'target_amount', 'current_amount', 'image', 'deadline', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function ledgers()
    {
        return $this->hasMany(TransparencyLedger::class);
    }
}
