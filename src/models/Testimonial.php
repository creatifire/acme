<?php namespace Acme\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
    public function user()
    {
        $this->hasOne('Acme\models\User');
    }    
}
