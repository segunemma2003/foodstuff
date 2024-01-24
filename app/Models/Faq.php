<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 * 
 * @property int $ID
 * @property string $Category
 * @property string $Question
 * @property string $Answer
 *
 * @package App\Models
 */
class Faq extends Model
{
	protected $table = 'faqs';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Category',
		'Question',
		'Answer'
	];
}
