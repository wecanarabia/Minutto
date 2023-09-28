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

    // const DEFAULTTYPES = [
    //     ['en'=>'vacation days','ar'=>'أيام أجازة'],
    //     ['en'=>'Salary number of working days','ar'=>'مستحقات لعدد من أيام العمل'],
    //     ['en'=>'amount','ar'=>'مبلغ مالي'],
    // ];
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function rewards(){
        return $this->hasMany(Reward::class,'reward_type_id','id');
    }
}
