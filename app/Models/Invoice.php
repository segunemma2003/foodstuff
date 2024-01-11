<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $ID
 * @property string $FullName
 * @property string $UUID
 * @property string $Address
 * @property string $InvoiceID
 * @property string $IsCartOrder
 * @property Carbon $ServerDateTime
 * @property string $Budget
 * @property string $Status
 * @property string $Paid
 * @property string $PaymentMethod
 * @property string $Tax
 * @property string $Total
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ServerDateTime' => 'datetime'
	];

	protected $fillable = [
		'FullName',
		'UUID',
		'Address',
		'InvoiceID',
		'IsCartOrder',
		'ServerDateTime',
		'Budget',
		'Status',
		'Paid',
		'PaymentMethod',
		'Tax',
		'Total'
	];
}
