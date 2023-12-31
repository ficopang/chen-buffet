<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    public function header()
    {
        return $this->belongsTo(HeaderTransaction::class);
    }
    public function food()
    {
        return $this->belongsTo(Foods::class);
    }
}
