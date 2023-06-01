<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded=[];
    public $translatable = ['name'];

    public function users()
    {
        return $this->hasMany(CompanyAdmin::class);
    }
    
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function getPermissionsAttribute($permission)
    {
        return json_decode($permission);
    }
}
