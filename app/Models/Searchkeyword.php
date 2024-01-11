<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Searchkeyword
 * 
 * @property int $ID
 * @property string $Keyword
 * @property string $Occurence
 * @property string $Saved
 *
 * @package App\Models
 */
class Searchkeyword extends Model
{
	protected $table = 'searchkeyword';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Keyword',
		'Occurence',
		'Saved'
	];
}
