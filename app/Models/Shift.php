<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function branches()
    {
        return $this->belongsToMany(Branch::class,'branch_shifts','shift_id', 'branch_id');
    }
}
