<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurantmenu
 * 
 * @property int $ID
 * @property string $RestaurantID
 * @property string $MenuName
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Restaurantmenu extends Model
{
	protected $table = 'restaurantmenus';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'RestaurantID',
		'MenuName',
		'ServerDateTime'
	];
}
