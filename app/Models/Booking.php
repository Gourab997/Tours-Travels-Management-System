<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = "b_id";
    public function tour_info(){
        return $this->hasOne('App\Models\Tourguide','t_id','tour_username');
    }

    public static function getAllpackages(){
        return Booking::with(['tour_info'])->orderBy('t_id','DESC')->paginate(10);
    }
}
