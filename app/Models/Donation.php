<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id', 'campaign_id', 'amount', 'payment_method', 
        'status', 'is_anonymous', 'message', 'guest_name', 'guest_email', 'transaction_id',
        'is_recurring', 'billing_cycle'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
