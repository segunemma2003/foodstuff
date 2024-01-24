<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Affiliateearning
 * 
 * @property int $ID
 * @property string $AffiliateID
 * @property string $AffiliateUUID
 * @property string $ReferredUsername
 * @property string $ReferredUUID
 * @property string $Commision
 * @property string $Status
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Affiliateearning extends Model
{
	protected $table = 'affiliateearnings';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'AffiliateID',
		'AffiliateUUID',
		'ReferredUsername',
		'ReferredUUID',
		'Commision',
		'Status',
		'ServerDateTime'
	];
}
