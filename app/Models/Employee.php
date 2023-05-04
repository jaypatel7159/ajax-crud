<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub_employee;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ["f_name","l_name","email","gender","hobby","image","sub_emp_id","u_id"];

    public function getSubEmployee() {
        
        return $this->hasOne(Sub_employee::class,"id","sub_emp_id");
    }
}
