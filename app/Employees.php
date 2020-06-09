<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    // Create Employees Mode
    protected $fillable = [
        'username','name','email' 
     ];
  
  
}
