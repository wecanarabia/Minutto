<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;


class Company extends Model
{
    use HasFactory;

    use HasTranslations;



    protected $guarded=[];
    public $translatable = ['name','description'];


    public function getLeaveHoursAttribute()
    {
        return Carbon::createFromFormat('H:i:s', '00:00:00')
                     ->addSeconds($this->attributes['leaves_count'] * 3600)
                     ->format('H:i:s');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }



    public function branches(){
        return $this->hasMany(Branch::class);
    }
    
    public function officialVacations(){
        return $this->hasMany(OfficialVacation::class);
    }


    public function vactypes(){
        return $this->hasMany(VacationType::class);
    }

    public function leavetypes(){
        return $this->hasMany(LeaveType::class);
    }

    public function rewardtypes(){
        return $this->hasMany(RewardType::class);
    }

    public function extratypes(){
        return $this->hasMany(ExtraType::class);
    }


}
