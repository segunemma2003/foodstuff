<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * 
 * @property int $ID
 * @property string $UUID
 * @property string $ProductID
 *
 * @package App\Models
 */
class Like extends Model
{
	protected $table = 'likes';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'UUID',
		'ProductID'
	];
}
