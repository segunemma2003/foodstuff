<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $Address
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'UUID',
		'Address'
	];
}
