<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompanyAdmin extends Authenticatable
{
    use HasFactory;
    protected $fillable =['name','email','password','phone','company_id','image'];
    protected $hidden =['password'];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/company/admins/'), $filename);
            $this->attributes['image'] =  'img/company/admins/'.$filename;
        }
    }
    protected static function booted()
    {
        static::deleted(function ($admin) {
            if ($admin->image  && \Illuminate\Support\Facades\File::exists($admin->image)) {
                unlink($admin->image);
            }
        });
    }
}
