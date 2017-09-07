<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
    protected $fillable = ['title','description','photo'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
