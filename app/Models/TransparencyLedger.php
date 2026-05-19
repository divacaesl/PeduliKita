<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparencyLedger extends Model
{
    protected $fillable = [
        'campaign_id', 'title', 'description', 
        'amount', 'receipt_image', 'expense_date'
    ];

    protected $casts = [
        'expense_date' => 'date',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
