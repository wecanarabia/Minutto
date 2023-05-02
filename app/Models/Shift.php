<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Shift extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded=[];
    public $translatable = ['name'];

    public function branches()
    {
        return $this->belongsToMany(Branch::class,'branch_shifts','shift_id', 'branch_id');
    }

    public function workdays()
    {
        return $this->hasMany(Workday::class);
    }
}
