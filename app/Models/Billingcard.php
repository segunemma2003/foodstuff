<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Billingcard
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $CardNumber
 * @property string $CardHolder
 * @property string $ExpiryDate
 * @property string $CVV
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Billingcard extends Model
{
	protected $table = 'billingcards';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'CardNumber',
		'CardHolder',
		'ExpiryDate',
		'CVV',
		'ServerDateTime'
	];
}
