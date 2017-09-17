<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowerItem extends Model
{
    public function item(){
    	return $this->belongsTo('App\StaffItem', 'staffitem_id','id');
    }
    public function borrower(){
    	return $this->belongsTo('App\Borrower');
    }
}
