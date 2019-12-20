<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class KhaltiPaymentLog extends Model
{
    protected $table = 'khalti_payment_logs';
    protected $fillable = [
        'idx',
        'token',
        'amount',
        'mobile',
        'product_identity',
        'product_name',
        'product_url',
        'widget_id',
        'userName'
    ];
}
