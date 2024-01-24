<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blogpost
 * 
 * @property int $ID
 * @property string $PostID
 * @property string $DisplayImage
 * @property string $Header
 * @property string $Body
 * @property string $Date
 * @property string $Link
 * @property string $Category
 * @property string $Tags
 * @property string $Source
 * @property string $IsOnline
 *
 * @package App\Models
 */
class Blogpost extends Model
{
	protected $table = 'blogposts';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'PostID',
		'DisplayImage',
		'Header',
		'Body',
		'Date',
		'Link',
		'Category',
		'Tags',
		'Source',
		'IsOnline'
	];
}
