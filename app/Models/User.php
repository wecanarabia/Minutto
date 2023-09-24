<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
            $file->move(base_path('../img/badges/'), $filename);
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

    public function UserVacations(){
        return $this->hasMany(EmployeeVacation::class);
    }

    public function userVacation(){
        return $this->hasOne(EmployeeVacation::class)->whereYear('created_at', '=', Carbon::now()->year);
    }

    public function salaries(){
        return $this->hasMany(Salary::class);
    }

    public function salary(){
        return $this->hasOne(Salary::class)->where('month', Carbon::now()->month)->where('year', Carbon::now()->year);
    }



    public function workhours(){
        return $this->hasMany(Workhour::class);

    }



    public function leaves(){

        return $this->hasMany(Leave::class);

    }


    public function advances(){
        return $this->hasMany(Advance::class);
    }

    public function extras(){
        return $this->hasMany(Extra::class);
    }

    public function alerts(){
        return $this->hasMany(Alert::class);
    }

    public function rewards(){
        return $this->hasMany(Reward::class);
    }

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function scopeHasVacation($query){
        return $query->whereHas('userVacation');
    }

    public function scopeHasSalary($query){
        return $query->whereHas('salary');
    }

    public function scopeHasNotSalary($query){
        return $query->whereDoesntHave('salary');
    }

    public function scopeHasNotSalary($query){
        return $query->whereDoesntHave('salary');
    }

    public function scopeNotOfThisMonth($q,$now){
        return $q->where(function ($query) use ($now) {
            $query->whereYear('created_at', '!=', $now->year)
                ->orWhere(function ($query) use ($now) {
                    $query->whereYear('created_at', $now->year)
                        ->whereMonth('created_at', '!=', $now->month);
                });
        });
    }

    public function scopeThisMonth($q,$now){
        return $q->where(function ($query) use ($now) {
            $query->whereYear('created_at', $now->year)
                ->orWhere(function ($query) use ($now) {
                    $query->whereYear('created_at', $now->year)
                        ->whereMonth('created_at', $now->month);
                });
        });
    }

    public function logs()
    {
        return $this->hasMany(Log::class,'employee_id');
    }

}
