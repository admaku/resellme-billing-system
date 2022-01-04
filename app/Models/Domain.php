<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nameserver;
use App\Models\Contact;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'registration_date',
        'expiration_date'
    ];

    /**
     * Nameservers for the domain
     * 
     * @return HasOne
     * 
     */
    public function nameserver() {
        return $this->hasOne(Nameserver::class);
    }

    /**
     * Contact for the domain
     * 
     * @return HasOne
     * 
     */
    public function contact() {
        return $this->hasOne(Contact::class);
    }

    /**
     * All domains should be lower case
     * 
     * @return void
     * 
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
