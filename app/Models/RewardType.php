<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RewardType extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['name'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function rewards(){
        return $this->hasMany(Reward::class,'reward_type_id','id');
    }
}
