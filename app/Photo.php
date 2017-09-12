<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['photo'];
    protected $primarykey = 'id';
    public $timestamps = false;
}
