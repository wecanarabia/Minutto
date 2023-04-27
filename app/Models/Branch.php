<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        return $this->hasMany(User::class);
    }
    
    public function shifts()
    {
        return $this->belongsToMany(Shift::class,'branch_shifts', 'branch_id', 'shift_id');
    }
}
