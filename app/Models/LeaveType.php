<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LeaveType extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['name'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function leaves(){
        return $this->hasMany(Leave::class,'leave_type_id','id');
    }
}
