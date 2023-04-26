<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/badges/'), $filename);
            $this->attributes['image'] =  'img/badges/'.$filename;
        }
    }
    
    protected static function booted()
    {
        static::deleted(function ($user) {
            if ($user->image  && \Illuminate\Support\Facades\File::exists($user->image)) {
                unlink($user->image);
            }
        });
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function department(){
        return $this->belongsTo(department::class);
    }

    public function fingerprint(){
        return $this->belongsTo(Fingerprint::class);
    }

    public function vacations(){
        return $this->hasMany(Vacation::class);
    }



    public function workhours(){
        return $this->hasMany(Workhour::class);
    }

    public function leaves(){
        return $this->hasMany(Leave::class);

    }


}
