<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    protected $fillable = [
        'name',
        'number',
        'speciality',
        'room',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('images/doctors/' . $this->image) : asset('images/default-doctor.jpg');
    }
    // Accessor for full name
    public function getFullNameAttribute()
    {
        return "Dr. {$this->name}";
    }
    // Accessor for formatted speciality
    public function getSpecialityLabelAttribute()
    {
        return ucfirst($this->speciality);
    }
}
