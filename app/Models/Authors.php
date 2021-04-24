<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'authors';
    public $timestamps = false;
    protected $fillable = ['name'];

    function create($name){        
        $this->name = $name;
    }
}
