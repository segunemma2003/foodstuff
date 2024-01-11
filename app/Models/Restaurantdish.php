<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurantdish
 * 
 * @property int $ID
 * @property string $RestaurantID
 * @property string $MenuName
 * @property string $ImagePath
 * @property string $DishName
 * @property string $Price
 * @property string $AboutDish
 * @property string $Status
 * @property string $IsOnline
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Restaurantdish extends Model
{
	protected $table = 'restaurantdishes';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'RestaurantID',
		'MenuName',
		'ImagePath',
		'DishName',
		'Price',
		'AboutDish',
		'Status',
		'IsOnline',
		'ServerDateTime'
	];
}
