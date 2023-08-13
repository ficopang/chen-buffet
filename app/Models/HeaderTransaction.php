<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{
    use HasFactory;

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
    public function detail()
    {
        return $this->hasMany(DetailTransaction::class, 'transaction_id');
    }
}
