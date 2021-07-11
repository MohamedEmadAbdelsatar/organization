<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = "loans";

    protected $fillable = ['borrower_id', 'value', 'earn', 'installment', 'start', 'end'];

    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
}
