<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Faq extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['question','answer'];
    public function company(){
        return $this->belongsTo(Company::class);
    }



}
