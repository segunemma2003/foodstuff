<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Changelog
 * 
 * @property int $ID
 * @property string $LogName
 * @property string $AboutLog
 * @property string $Mode
 * @property string $LastEditedDate
 * @property string $Version
 *
 * @package App\Models
 */
class Changelog extends Model
{
	protected $table = 'changelog';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'LogName',
		'AboutLog',
		'Mode',
		'LastEditedDate',
		'Version'
	];
}
