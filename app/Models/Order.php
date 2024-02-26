<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'FullName',
		'UUID',
		'Address',
		'InvoiceID',
		'IsCartOrder',
		'ServerDateTime',
		'price',
		'ordertype',
		'status',
		'PaymentMethod'
	];


    public function carts(){
        return $this->hasMany("App\Models\Cart", "OrderID", "InvoiceID");
    }


}
