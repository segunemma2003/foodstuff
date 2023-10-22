<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Foodstuffcategroie
 * 
 * @property int $ID
 * @property string $Category
 *
 * @package App\Models
 */
class Foodstuffcategroie extends Model
{
	protected $table = 'foodstuffcategroies';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Category'
	];
}
