<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 *
 * @property int $ID
 * @property string $UUID
 * @property string $ProductID
 * @property string $Status
 * @property string $Quantity
 * @property string $OrderID
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'cart';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'ProductID',
		'Status',
		'Quantity',
		'OrderID',
		'ServerDateTime',
        'price'
	];


    public function product(){
        return $this->hasOne("App\Models\Foodstuff","ProductID","ProductID");
    }
}

