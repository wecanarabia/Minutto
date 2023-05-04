<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

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


    public function head(){
        return $this->hasOne(User::class,'branch_id','id');
    }
}
