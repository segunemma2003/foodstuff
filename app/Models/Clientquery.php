<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clientquery
 * 
 * @property int $ID
 * @property string $Name
 * @property string $UserEmail
 * @property string $Company
 * @property string $PhoneNumber
 * @property string $Department
 * @property string $Subject
 * @property string $Query
 * @property string $ClientDateTime
 * @property Carbon $ServerDateTime
 * @property string $responded
 *
 * @package App\Models
 */
class Clientquery extends Model
{
	protected $table = 'clientqueries';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'UserEmail',
		'Company',
		'PhoneNumber',
		'Department',
		'Subject',
		'Query',
		'ClientDateTime',
		'ServerDateTime',
		'responded'
	];
}
