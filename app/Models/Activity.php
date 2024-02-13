<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $Message
 * @property Carbon $ServerDateTime
 * @property string $Link
 * @property string $Seen
 * @property string $Type
 *
 * @package App\Models
 */
class Activity extends Model
{
	protected $table = 'activity';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'Message',
		'ServerDateTime',
		'Link',
		'Seen',
		'Type'
	];
}
