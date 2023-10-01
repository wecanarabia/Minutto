<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
    use HasFactory,HasTranslations;
    protected $table='bonus';
    protected $guarded=[];
    public $translatable = ['type'];
    const TYPES = [
        ['en'=>'vacation days','ar'=>'أيام أجازة'],
        ['en'=>'amount','ar'=>'مبلغ مالي'],
    ];

    public function setFileAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../file/bonus/'), $filename);
            $this->attributes['file'] =  'file/bonus/'.$filename;
        }
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
