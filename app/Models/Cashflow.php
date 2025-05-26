<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    protected $fillable = [
        'invest_amount',
        'invest_date',
        'invest_remarks',
        'invest_proof',
        'profit_amount',
        'profit_date',
        'profit_remarks',
        'profit_proof',
        'user_id',
        'flow_type'
    ];
}
