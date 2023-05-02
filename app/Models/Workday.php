<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Workday extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    const WORKDAYS =[['en'=>'Sunday','ar'=>'الأحد'],
            ['en'=>'Monday','ar'=>'الأثنين'],
            ['en'=>'Tuesday','ar'=>'الثلاثاء'],
            ['en'=>'Wednesday','ar'=>'الأربعاء'],
            ['en'=>'Thursday','ar'=>'الخميس'],
            ['en'=>'Friday','ar'=>'الجمعة'],
            ['en'=>'Saturday','ar'=>'السبت']
        ];

    public $translatable = ['day'];

    public function shift(){
        return $this->belongsTo(Shift::class);
    }
}
