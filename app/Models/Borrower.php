<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $table = "borrowers";

    protected $fillable = [
        'name',
        'city_id',
        'governorate_id',
        'phone',
        'national_id',
        'location',
        'job',
        'guaranator_name',
        'guaranator_city_id',
        'guaranator_governorate_id',
        'guaranator_phone',
        'guaranator_national_id',
        'guaranator_location',
        'guaranator_job',
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }

    public function guaranator_city(){
        return $this->belongsTo(City::class, 'guaranator_city_id');
    }

    public function guaranator_governorate(){
        return $this->belongsTo(Governorate::class, 'guaranator_governorate_id');
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function months(){
        return $this->hasMany(LoanMonths::class);
    }
}
