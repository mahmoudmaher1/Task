<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function Employee(){

        return $this->belongsTo('App\Company', 'foreign_key');
    }
    public function Image(){

        return $this->belongsTo('App\Form', 'foreign_key');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName','company','phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
