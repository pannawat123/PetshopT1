<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pettype extends Model
{
    use HasFactory;

    protected $table = 'pettype';

    public function pet()
    {
        return $this->hasMany('App\Models\Pet');
    }

}
