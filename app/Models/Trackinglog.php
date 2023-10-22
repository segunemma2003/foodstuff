<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trackinglog
 * 
 * @property int $ID
 * @property string $InvoiceID
 * @property string $UUID
 * @property string $Chapter
 * @property string $Message
 *
 * @package App\Models
 */
class Trackinglog extends Model
{
	protected $table = 'trackinglog';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'InvoiceID',
		'UUID',
		'Chapter',
		'Message'
	];
}
