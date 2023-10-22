<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shoppinglist
 * 
 * @property int $ID
 * @property string $InvoiceID
 * @property string $Status
 * @property string $Name
 * @property string $Quantity
 * @property string $Unit
 * @property string $Price
 * @property string $UUID
 *
 * @package App\Models
 */
class Shoppinglist extends Model
{
	protected $table = 'shoppinglist';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'InvoiceID',
		'Status',
		'Name',
		'Quantity',
		'Unit',
		'Price',
		'UUID'
	];
}
