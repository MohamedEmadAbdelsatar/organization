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

    public function months(){
        return $this->hasMany(LoanMonths::class);
    }

    public function getPaidMonthsAttribute(){
        $paid = $this->months->filter(function ($item) {
            return $item->status == '1';
        })->values();
        return count($paid);
    }

    public function getUnPaidMonthsAttribute(){
        $paid = $this->months->filter(function ($item) {
            return $item->status == '0';
        })->values();
        return count($paid);
    }
}
