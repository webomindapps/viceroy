<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id', 'image_url'];
    public function registration()
    {
        return $this->belongsTo(Registration::class, 'guest_id');
    }
}
