<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Page extends Model
{

    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['title','content'];

    const TITLES = [
        ['en'=>'Internal system','ar'=>'النظام الداخلي'],
        ['en'=>'Departures and vacation system','ar'=>'نظام الأجازات والمغادرات'],
    ];

    const BODY = ['en'=>'There is no content','ar'=>'لا يوجد محتوى'];
    public function company(){
        return $this->belongsTo(Company::class);
    }

}
