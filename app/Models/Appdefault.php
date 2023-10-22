<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Appdefault
 * 
 * @property int $ID
 * @property string $FieldName
 * @property string $VariableName
 * @property string $VariableValue
 * @property string $Description
 * @property string $HtmlInputFieldDataType
 * @property string $LastEditorsUUID
 * @property string|null $Editable
 * @property Carbon $ServerDateTime
 *
 * @package App\Models
 */
class Appdefault extends Model
{
	protected $table = 'appdefault';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'FieldName',
		'VariableName',
		'VariableValue',
		'Description',
		'HtmlInputFieldDataType',
		'LastEditorsUUID',
		'Editable',
		'ServerDateTime'
	];
}
