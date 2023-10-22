<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adminactivity
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $Message
 * @property Carbon $ServerDateTime
 * @property string $Action
 *
 * @package App\Models
 */
class Adminactivity extends Model
{
	protected $table = 'adminactivities';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'Message',
		'ServerDateTime',
		'Action'
	];
}
