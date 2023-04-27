<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Company extends Model
{
    use HasFactory;

    use HasTranslations;



    protected $guarded=[];
    public $translatable = ['name','description'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }



    public function branches(){
        return $this->hasMany(Branch::class);
    }


    public function vactypes(){
        return $this->hasMany(VacationType::class);
    }

    public function leavetypes(){
        return $this->hasMany(LeaveType::class);
    }


}
