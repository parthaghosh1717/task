<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function gerPublishers(){
        return $this->hasOne('App\Models\Publisher', 'id', 'publishers_id');
    }
}
