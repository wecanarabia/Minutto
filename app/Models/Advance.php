<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advance extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['status'];

    const STATUS = [
        ['en'=>'waiting','ar'=>'في الانتظار'],
        ['en'=>'approve','ar'=>'مقبول'],
        ['en'=>'rejected','ar'=>'مرفوض'],
    ];

    public function setFileAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../file/appointment/'), $filename);
            $this->attributes['file'] =  'file/appointment/'.$filename;
        }
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
