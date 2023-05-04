<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['name','description'];

    public function employees(){
        return $this->hasMany(User::class);
    }

    public function head(){
        return $this->hasOne(User::class,'department_id','department_head');
    }
}
