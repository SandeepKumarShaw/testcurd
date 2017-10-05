<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BorrowerItem;

class StaffItem extends Model
{
    public function borrowed_item($staffitem_id){
    	return $borrowed_item = BorrowerItem::where('staffitem_id', $staffitem_id)->where('status', 0)->sum('quantity');
    }
}
