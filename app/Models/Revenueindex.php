<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Revenueindex
 * 
 * @property int $ID
 * @property string $Revenue
 * @property string $Type
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Revenueindex extends Model
{
	protected $table = 'revenueindex';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'Revenue',
		'Type',
		'ServerDateTime'
	];
}
