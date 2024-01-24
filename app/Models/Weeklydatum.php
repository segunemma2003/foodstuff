<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Weeklydatum
 * 
 * @property int $ID
 * @property string $Title
 * @property string $Monday
 * @property string $Tuesday
 * @property string $Wednesday
 * @property string $Thursday
 * @property string $Friday
 * @property string $Saturday
 * @property string $Sunday
 *
 * @package App\Models
 */
class Weeklydatum extends Model
{
	protected $table = 'weeklydata';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Title',
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday'
	];
}
