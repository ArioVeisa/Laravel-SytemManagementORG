<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
    
}
