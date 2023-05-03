<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Workhour extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['status'];

    const STATUS = [
        ['en'=>'disciplined','ar'=>'منضبط'],
        ['en'=>'late','ar'=>'متأخر'],
        ['en'=>'absence','ar'=>'غائب'],
        ['en'=>'vacation','ar'=>'اجازة'],
    ];

    public function setFileAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('file/appointment/'), $filename);
            $this->attributes['file'] =  'file/appointment/'.$filename;
        }
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
