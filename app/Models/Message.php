<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Message extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['body'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
