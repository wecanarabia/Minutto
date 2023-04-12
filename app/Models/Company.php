<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Company extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $translatable = ['name','description'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
