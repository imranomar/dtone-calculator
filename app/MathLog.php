<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Model for the MathLog table
class MathLog extends Model
{
    protected $fillable = ['endpoint','num1','num2'];
}
