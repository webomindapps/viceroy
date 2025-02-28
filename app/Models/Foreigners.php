<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foreigners extends Model
{
    use HasFactory;
    public $table="guest_foreigners";
    protected $fillable=[
        'guest_id',
        'passportno',
        'dateofissue',
        'placeofissue',
        'dateofexpiry',
        'dateofarrival',
        'visano',
        'placeofvisaissue',
        'durationofstay',
        'dateofvisaissue',
        'dateofvisaexpiry',
        'employeed',
        'guest_name',
        'guest_phone',
        
    ];
    public function guest()
    {
        return $this->belongsTo(Registration::class, 'guest_id');
    }
}
