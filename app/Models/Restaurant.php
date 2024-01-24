<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurant
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $RestaurantID
 * @property string $StoreBannerImagePath
 * @property string $ValidIdFilePath
 * @property string $UtilityBillFilePath
 * @property string $NumberOfLocations
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $PhoneNumber
 * @property string $RegNumber
 * @property string $StoreHours
 * @property string $PaymentMethods
 * @property string $DeliveryFee
 * @property string $BusinessName
 * @property string $StoreAddress
 * @property string $FloorSuite
 * @property string $StoreName
 * @property string $BusinessType
 * @property string $CuisineType
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Restaurant extends Model
{
	protected $table = 'restaurants';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'RestaurantID',
		'StoreBannerImagePath',
		'ValidIdFilePath',
		'UtilityBillFilePath',
		'NumberOfLocations',
		'FirstName',
		'LastName',
		'Email',
		'PhoneNumber',
		'RegNumber',
		'StoreHours',
		'PaymentMethods',
		'DeliveryFee',
		'BusinessName',
		'StoreAddress',
		'FloorSuite',
		'StoreName',
		'BusinessType',
		'CuisineType',
		'ServerDateTime'
	];
}
