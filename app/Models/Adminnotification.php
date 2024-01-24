<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adminnotification
 * 
 * @property int $ID
 * @property string $Message
 * @property Carbon $ServerDateTime
 * @property string $Done
 * @property string $Redirect
 * @property string $Type
 *
 * @package App\Models
 */
class Adminnotification extends Model
{
	protected $table = 'adminnotifications';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'Message',
		'ServerDateTime',
		'Done',
		'Redirect',
		'Type'
	];
}
