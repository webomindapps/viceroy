<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    use HasFactory;
    protected $table = 'guest_registration';
    protected $fillable = [
        'grc_id',
        'firstname',
        'lastname',
        'dob',
        'address',
        'arrivingfrom',
        'datetime',
        'purposeofvisit',
        'depaturedate',
        'proceedingto',
        'email',
        'phone',
        'nationality',
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
        'roomno',
        'packno',
        'manager_signature_image_url',
        'mealplan',
        'isvip',
        'vipdetails',
        'notes_text',
        'signature_image_url',
    ];
    public function documents()
    {
        return $this->hasMany(Document::class, 'guest_id');
    }
    public function foreigners()
    {
        return $this->hasMany(Foreigners::class, 'guest_id');
    }
}
