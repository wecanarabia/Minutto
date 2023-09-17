<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompanyAdmin extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $fillable =['name','email','password','phone','company_id','image','role_id','remember_token'];
    protected $hidden =['password'];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../img/company/admins/'), $filename);
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

    public function check_password($password)
    {
        return Hash::check($password, $this->password);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');//one to one
    }

    public function hasAbility($permissions)//get permission from provider & check it
    {
        $role=$this->role;//get & check relation
        if(!$role){
            return false;
        }
        foreach ($role->permissions as $permission)
        {
            if(is_array($permissions) && in_array($permission,$permissions)){
                return true;
            }elseif (is_string($permissions) && strcmp($permissions,$permission) == 0){
                return true;
            }
        }
        return false;
    }


    public function logs()
    {
        return $this->hasMany(Log::class,'company_admin_id');
    }
}
