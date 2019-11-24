<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repertory extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
