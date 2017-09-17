<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    public function borrower_item(){
    	return $this->hasMany('App\BorrowerItem');
    }
}
