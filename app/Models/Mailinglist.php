<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mailinglist
 * 
 * @property int $ID
 * @property string $UserEmail
 * @property string $Active
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Mailinglist extends Model
{
	protected $table = 'mailinglist';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UserEmail',
		'Active',
		'ServerDateTime'
	];
}
