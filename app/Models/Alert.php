<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alert extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['type'];
    
    const TYPES = [
        ['en'=>'vacation days','ar'=>'أيام أجازة'],
        ['en'=>'Salary number of working days','ar'=>'مستحقات لعدد من أيام العمل'],
        ['en'=>'amount','ar'=>'مبلغ مالي'],
        ['en'=>'attention','ar'=>'لفت نظر'],
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
