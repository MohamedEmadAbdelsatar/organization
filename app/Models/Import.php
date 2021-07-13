<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'imports';

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function getPaidBaseBatchesAttribute(){
        $paid = $this->batches->filter(function ($item) {
            return $item->status == '1';
        })->values();
        return count($paid);
    }

    public function getPaidinterestBatchesAttribute(){
        $paid = $this->batches->filter(function ($item) {
            return $item->status == '0';
        })->values();
        return count($paid);
    }
}
