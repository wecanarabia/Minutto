<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function setNetSalaryAttribute(){
        $this->attributes['net_salary'] =($this->actual_salary + $this->incentives_and_extra)-($this->discounts+$this->advances);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
