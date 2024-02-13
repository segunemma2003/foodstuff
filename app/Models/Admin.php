<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $UserEmail
 * @property string $Username
 * @property string $Passphrase
 * @property Carbon $RegDate
 * @property string $AddedBy
 * @property string $Roll
 * @property string $EmpNumber
 * @property string $GrantAccess
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admins';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'RegDate' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'UserEmail',
		'Username',
		'Passphrase',
		'RegDate',
		'AddedBy',
		'Roll',
		'EmpNumber',
		'GrantAccess'
	];
}
