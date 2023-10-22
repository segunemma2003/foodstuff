<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurantdistributor
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $DistributorName
 * @property string $Username
 * @property string $Password
 * @property string $Status
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Restaurantdistributor extends Model
{
	protected $table = 'restaurantdistributors';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'DistributorName',
		'Username',
		'Password',
		'Status',
		'ServerDateTime'
	];
}
