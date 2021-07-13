<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    public function import(){
        return $this->belongsTo(Import::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
