<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    
    

   // protected $table = null;
    
   protected $primaryKey = "id";
  
   public $timestamps = true;
    //const CREATED_AT =null;
    //const CREATED_AT ="create_time";
    //const UPDATED_AT =null;
}
