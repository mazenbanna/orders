<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Orders extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';


    public function __construct()
    {
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','client_id','id');
    }
    public function order_item()
    {
        $obj=$this->hasMany('App\Models\OrderItem','order_id','id')
        ->join('item', 'item.id', '=', 'order_item.item_id');
        return $obj;
    }

}
