<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table="subscribe";
    protected $primaryKey="id";
    protected $fillable=[
    	'email'
    ];
}
