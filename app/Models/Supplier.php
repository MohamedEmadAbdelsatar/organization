<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public function imports(){
        return $this->hasMany(Import::class);
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }
}
