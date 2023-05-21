<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['log','on'];

    public function admin(){
        return $this->belongsTo(CompanyAdmin::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
