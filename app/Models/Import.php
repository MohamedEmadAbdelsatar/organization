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
            return $item->status == '1' && $item->type == '1';
        });
        return count($paid);
    }

    public function getUnPaidbaseBatchesAttribute(){
        $paid = $this->batches->filter(function ($item) {
            return $item->status == '0' && $item->type == '1';
        });
        return count($paid);
    }

    public function getPaidInterestBatchesAttribute(){
        $paid = $this->batches->filter(function ($item) {
            return $item->status == '1' && $item->type == '2';
        });
        return count($paid);
    }

    public function getUnPaidInterestBatchesAttribute(){
        $paid = $this->batches->filter(function ($item) {
            return $item->status == '0' && $item->type == '2';
        });
        return count($paid);
    }
}
