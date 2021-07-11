<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanMonths extends Model
{
    protected $table = 'loans_months';

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
}
