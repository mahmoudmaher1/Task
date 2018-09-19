<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function Image(){

        return $this->belongsTo('App\Form', 'foreign_key');
    }
}
