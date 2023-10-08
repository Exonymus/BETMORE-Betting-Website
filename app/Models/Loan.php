<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function lender()
    {
        return $this->belongsTo(User::class, 'lender_user_id');
    }

    public function borrower()
    {
        return $this->belongsTo(User::class, 'borrower_user_id');
    }
}
